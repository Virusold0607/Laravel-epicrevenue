<?php

namespace App\Http\Controllers\User;

use App\Models\SocialAccount;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Promote;
use App\Models\Promotion;
use File;
use Auth;
use Response;


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
        $accounts = SocialAccount::where('user_id', auth()->user()->id)->get();
        return view('user.promote.index', compact('accounts'));

    }

    /**
     * Display the resource.
     *
     * @param $id
     * @return Response
     */
	public function show($id){
		$data['account'] = SocialAccount::where('user_id', (int) auth()->user()->id)
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
        return view('user.promote.networks');
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
