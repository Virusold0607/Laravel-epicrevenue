<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Helper;
use App\Models\AccountStatus;
use App\Models\CampaignRate;
use App\Models\Campaign;
use App\Models\EmailNotification;
use App\Models\Report;
use App\Models\Role;
use App\Models\UserApi;
use App\Models\UserBalance;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\SocialAccount;
use GuzzleHttp\Exception\ClientException;
use Mockery\CountValidator\Exception;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $query = User::with('status');

        if($request->input('my') == 'true' && app()->environment('staging', 'production'))
            $query = $query->where('approved_by', auth()->user()->id);

        if($request->input('status') == 'true')
            $query = $query->where('approved', 'no');

        if(!empty($request->input('search', '')) && $request->input('search_by', 'id') !== 'created_at')
        {
            $query = $query->where($request->input('search_by', 'id'), 'like', '%' . $request->input('search') . '%');
        }



        $query = $query->orderBy($request->input('order_by', 'id'), $request->input('order', 'dsc'));

        $publishers = $query->paginate(10);

        foreach ($publishers as $publisher) {
            $publisher->total_earned = $publisher->where('id', $publisher->id)->first()->reports()->lead()->sum('rate');
            $publisher->total_paid = $publisher->balance()->first()->histories()->where('operation', 'withdraw')->sum('amount');
        }

        return $publishers;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function my()
    {
        $users = User::where('approved_by', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->paginate(10);
        return $users;
    }

    /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request, $id)
    {
        $data['user'] = User::where('id', $id)->with('socialAccounts')->firstOrFail();

        $data['clicks']        = $data['user']->reports()->click()->count();
        $data['leads']         = $data['user']->reports()->lead()->count();
        $data['reversals']     = $data['user']->reports()->reversal()->count();

        $data['today_earnings'] = $data['user']->balance()->first()->histories()->today()->operationOf('add')->sum('amount');
        $data['month_earnings'] = $data['user']->balance()->first()->histories()->month()->operationOf('add')->sum('amount');
        $data['total_earnings']      =  $data['user']->balance()->first()->histories()->operationOf('add')->sum('amount');

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data['user'] = User::where('id', $id)->with('status')->firstOrFail();
        $data['rates'] = CampaignRate::where('user_id', $id)->with('campaign')->get();

        $data['today_clicks']           = $data['user']->reports()->today()->click()->count();
        $data['today_unique_clicks']    = $data['user']->reports()->today()->click()->get()->unique(function ($item) { return $item['campaign_id']. ' ' .$item['ip']; })->count();
        $data['today_leads']            = $data['user']->reports()->today()->lead()->count();
        $data['today_reversals']        = $data['user']->reports()->today()->reversal()->count();

        $data['today_earnings']         = $data['user']->balance()->first()->histories()->today()->operationOf('add')->sum('amount');
        $data['month_earnings']         = $data['user']->balance()->first()->histories()->month()->operationOf('add')->sum('amount');
        $data['lastMonth_earnings']     = $data['user']->balance()->first()->histories()->monthLast()->operationOf('add')->sum('amount');
        $data['total_earnings']         = $data['user']->balance()->first()->histories()->operationOf('add')->sum('amount');

        $data['campaign_clicks']        = $data['user']->reports()->click()->count();
//        $data['campaign_unique_clicks'] = $data['user']->reports()->click()->get()->unique(function ($item) { return $item['campaign_id']. ' ' .$item['ip']; })->count();
        $data['campaign_leads']         = $data['user']->reports()->lead()->count();
        $data['campaign_reversals']     = $data['user']->reports()->reversal()->count();

        $data['last_reports'] = $data['user']->reports()->orderBy('id', 'desc')->take(5)->get();

        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->with('status')->firstOrFail();
        $user->update(array(
            'firstname' => Helper::requestInput($request, 'user', 'firstname'),
            'lastname'  => Helper::requestInput($request, 'user', 'lastname'),
            'email'     => Helper::requestInput($request, 'user', 'email'),
            'phone'     => Helper::requestInput($request, 'user', 'phone'),
            'address1'  => Helper::requestInput($request, 'user', 'address1'),
            'address2'  => Helper::requestInput($request, 'user', 'address2'),
            'city'      => Helper::requestInput($request, 'user', 'city'),
            'state'     => Helper::requestInput($request, 'user', 'state'),
            'zip'       => Helper::requestInput($request, 'user', 'zip')
        ));

        if($request->input('user')['approved'] === 'yes')
        {
            $user->approved = 'yes';
            $user->approved_by = auth()->user()->id;
        }
        elseif($request->input('user')['approved'] === 'no')
        {
            $user->approved = 'no';
            $user->approved_by = null;
        }

        $user->status->email_confirmed = $request->input('user')['status']['email_confirmed'];
        $user->push();

        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

    }


    public function approval(Request $request, $id)
    {
        $user = User::find($id);
        if($request->has('approve'))
        {
            if($request->approve === 'yes')
            {
                $user->approved = 'yes';
                $user->approved_by = Auth::user()->id;
            }
            elseif($request->approve === 'no')
            {
                $user->approved = 'no';
                $user->approved_by = null;
            }
            $user->save();
            return 'success';
        }
        return 'fail';
    }


    /**
     *
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'firstname'         => 'required|string|min:3|max:255',
            'lastname'          => 'required|string|min:3|max:255',
            'email'             => 'required|unique:users|email|max:255',
            'instagramAccounts' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $user = User::create($request->all());
        $user->password = bcrypt('demopass');
        $user->approved = true;
        $user->approved_by = 1;
        $user->save();

        $status = new AccountStatus();
        $status->user_id = $user->id;
        $status->save();

        $balance = new UserBalance();
        $balance->user_id = $user->id;
        $balance->save();

        $email = new EmailNotification();
        $email->user_id = $user->id;
        $email->save();

        $api = new UserApi();
        $api->user_id = $user->id;
        $api->key = str_random() . $user->id ;
        $api->save();

        $status = AccountStatus::firstOrNew(['user_id' => (int)$user->id]);
//        $status->any_network_added = 'yes';
        $status->save();

        $instagramAccounts = explode(",", $request->input('instagramAccounts'));

        foreach ($instagramAccounts as $i) {
            $url = "https://www.instagram.com/" . strtolower($i) . "/?__a=1";

            try {
                $client = new \GuzzleHttp\Client();
                $res = $client->request('GET', $url, []);
            } catch (ClientException $e) {
                return response()->json('failed');
            } catch (Exception $e) {
                return response()->json('failed');
            }

            if ($res->getStatusCode() === 200) {
                $data = json_decode($res->getBody());

                $a_user = $user;

                $social_account = SocialAccount::firstOrNew(['account' => 'instagram', 'account_id' => (int)$data->user->id]);
                $social_account->account = "instagram";
                $social_account->user_id = $a_user->id;
                $social_account->account_id = $data->user->id;
                $social_account->profile_picture = $data->user->profile_pic_url;
                $social_account->username = $data->user->username;
                $social_account->bio = $data->user->biography;
                $social_account->website = $data->user->external_url;
                $social_account->name = $data->user->full_name;
                $social_account->followed_by = $data->user->followed_by->count;
                $social_account->follows = $data->user->follows->count;
                $social_account->approved = true;
                $social_account->save();

                $status = AccountStatus::firstOrNew(['user_id' => (int)$a_user->id]);
                $status->any_network_added = 'yes';
                $status->save();

//                return response()->json('success');

            } else {
                return response()->json('failed');
            }
        }

        return "Success";
    }

}
