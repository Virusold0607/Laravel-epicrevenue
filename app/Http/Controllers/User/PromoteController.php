<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Promote;
use App\Models\InstagramAccount;
use App\Models\Promotion;
use File;
use Auth;
use Response;
use MetzWeb\Instagram\Instagram;


class PromoteController extends Controller
{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->instagram = new Instagram(array(
            'apiKey'      => env('INSTAGRAM_KEY'),
            'apiSecret'   => env('INSTAGRAM_SECRET'),
            'apiCallback' => env('INSTAGRAM_CALLBACK_ADD')
        ));
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $accounts = InstagramAccount::where('user_id', auth()->user()->id)->get();
        return view('user.promote.index', compact('accounts'));

    }

    /**
     * Display the resource.
     *
     * @param $id
     * @return Response
     */
	public function show($id){
		$data['account'] = InstagramAccount::where('user_id', (int) auth()->user()->id)
            ->where('id', (int) $id)
            ->firstOrFail();
        $data['promotions'] = $data['account']->promotions()
            ->where('status', 'yes')
            ->with('influencers', 'categories')
            ->get();
		return view('user.promote.show', $data);
	}


    /**
     * Display a listing of the networks that can be added.
     *
     * @return Response
     */
    public function networks(Request $request)
    {
        $data = array();
        $data['instagram'] = $this->instagram;

        if ($request->get('code') && $request->user())
        {
            $user = $request->user();

            $code = $request->get('code');
            $instagram = $this->instagram->getOAuthToken($code);

            if(isset($instagram->user)) {
                $url = 'https://api.instagram.com/v1/users/' . $instagram->user->id . '?access_token=' . $instagram->access_token;
                $api_response = file_get_contents($url);
                $record = json_decode($api_response);

                if ((int)$record->data->counts->followed_by >= 999) {
                    $instagram_account = InstagramAccount::where('instagram_id', (int)$instagram->user->id)->first();
                    if(is_null($instagram_account))
                    {
                        $instagram_account = new InstagramAccount();
                        $instagram_account->user_id = $user->id;
                        $instagram_account->access_token = $instagram->access_token;
                        $instagram_account->instagram_id = $instagram->user->id;
                        $instagram_account->profile_picture = $instagram->user->profile_picture;
                        $instagram_account->username = $instagram->user->username;
                        $instagram_account->bio = $instagram->user->bio;
                        $instagram_account->website = $instagram->user->website;
                        $instagram_account->full_name = $instagram->user->full_name;
                        $instagram_account->followed_by = $record->data->counts->followed_by;
                        $instagram_account->follows = $record->data->counts->follows;
                        $instagram_account->save();

                        $user->status->any_network_added = 'yes';
                        $user->push();
                    } else {
                        $data['error']['alreadyAdded'] = "Sorry we cannot add this account. This account is already associated with another account.";
                    }

                    return redirect('/promote?ig=1');
                } else {
                    $data['error']['lessThan1k'] = "Sorry at this time we are only accepting users with atleast 1000 or more followers.";
                }
            } else {
                $data['error']['someProblem'] = "Sorry we cannot add this account. Something goes wrong. Try to add again.";
            }
        }

        return view('user.promote.networks', $data);
    }



    /*
    * Show Feature image
    *
    * @param string $name
    * @return Response
    * */
    public function featureImage($id)
    {
        $p = Promotion::findOrFail($id);
        $path = storage_path('app/images/promotion/' . $p->featured_img);
        if( File::exists($path) ) {

            $filetype = File::type($path);

            $response = Response::make(\File::get($path), 200);

            $response->header('Content-Type', $filetype);
            return $response;
        } else {
            $path = storage_path('app/images/campaign/default.jpg');
            $filetype = \File::type($path);
            $response = \Response::make(\File::get($path), 200);
            $response->header('Content-Type', $filetype);
            return $response;
        }

    }

}
