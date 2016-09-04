<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Models\SocialAccount;
use GuzzleHttp\Exception\ClientException;
use Mockery\CountValidator\Exception;

use App\Models\AccountStatus;
use App\Models\EmailNotification;
use App\Models\PaymentDetail;
use App\Models\UserApi;
use App\Models\UserBalance;
use Carbon\Carbon;
use Mail;
use Auth;
use Socialite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\InstagramAccount;
use MetzWeb\Instagram\Instagram;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

//    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    protected $username = 'email';

    protected $instagram;
    protected $fb;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->instagram = new Instagram(array(
            'apiKey'      => env('INSTAGRAM_KEY'),
            'apiSecret'   => env('INSTAGRAM_SECRET'),
            'apiCallback' => env('INSTAGRAM_CALLBACK')
        ));

        $this->fb = new \Facebook\Facebook([
            'app_id' => env('FB_ID'),
            'app_secret' => env('FB_SECRET'),
            'default_graph_version' => 'v2.7',
        ]);
    }



    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        $user = new User();
        return view('auth.register')->with(compact('user'));
    }

    /**
     * Show the application network registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegisterNetworks(Request $request)
    {
        $data = array();
        $data['instagram'] = $this->instagram;
        if($request->has('middleware_error')){
            $data['error']['middleware'] = "You have to add atleast one account.";
        }

        return view('auth.networks', $data);
    }


    public function getRegisterSocialAccount(Request $request, $service)
    {
        $data['instagram'] = $this->instagram;

        if( strtolower($service) === 'instagram')
            $this->handleInstagramCallback($request);

        return view('auth.networks', $data);
    }


    public function redirectToProvider($provider)
    {
        if(strtolower($provider) === 'twitter')
            return Socialite::driver('twitter')->redirect();
        if(strtolower($provider) === 'facebook')
            return Socialite::driver('facebook')->redirect();

        return abort(404);
    }

    public function handleFacebookCallback(Request $request)
    {
        $user = Socialite::driver('facebook')->user();

//        $social_account = SocialAccount::firstOrNew(array('account_id' => (int) $user->getId()));
//        $social_account->user_id = auth()->user()->id;
//        $social_account->account = 'facebook';
//        $social_account->access_token = $user->token;
//        $social_account->account_id = (int) $user->getId();
//        $social_account->profile_picture = $user->getAvatar();
//        $social_account->username = $user->getNickname();
//        $social_account->full_name = $user->getName();
//        $social_account->followed_by = $user->data->counts->followed_by;
//        $social_account->follows = $user->data->counts->follows;
//        $social_account->save();

        return response()->json($user);
    }

    public function handleTwitterCallback(Request $request)
    {
        $user = Socialite::driver('twitter')->user();

        return response()->json($user);
    }


    public function handleInstagramVerification(Request $request, $username)
    {
        $url = "https://www.instagram.com/". strtolower($username) ."/?__a=1";

        try {
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', $url, []);
        } catch (ClientException $e) {
            return response()->json('failed');
        } catch (Exception $e) {
            return response()->json('failed');
        }

        if($res->getStatusCode() === 200)
        {
            $data = json_decode(  $res->getBody() );

            if(isset($data->user->external_url)) {
                if( $data->user->external_url === 'http://reachurl.com/verify/ig/'.auth()->user()->id
                    || $data->user->external_url === 'http://www.reachurl.com/verify/ig/'.auth()->user()->id
                ) {
                    $a_user = User::findOrFail((int) auth()->user()->id);

                    $social_account = SocialAccount::firstOrNew(['account' => 'instagram', 'account_id' => (int) $data->user->id]);
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
                    $social_account->save();

                    $status = AccountStatus::firstOrNew(['user_id' => (int) $a_user->id]);
                    $status->any_network_added = 'yes';
                    $status->save();

                    return response()->json('success');
                }
            } else {
                return response()->json('failed');
            }
        } else {
            return response()->json('failed');
        }
        return response()->json('failed');
    }

    private function handleInstagramCallback(Request $request)
    {
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

                if ((int)$record->data->counts->followed_by >= 10) {
                    $instagram_account = InstagramAccount::firstOrNew(array('instagram_id' => (int)$instagram->user->id));
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


                    $status = AccountStatus::firstOrNew(['user_id' => (int) $user->id]);
                    $status->any_payment_method_added = 'yes';
                    $status->save();

                    return redirect('/register/networks');
                } else {
                    $data['error']['lessThan1k'] = "Sorry at this time we are only accepting users with atleast 1000 or more followers.";
                }
            } else {
                $data['error']['someProblem'] = "Sorry we cannot add this account. Something goes wrong. Try to add again.";
            }
        }
    }


    /**
     * Show the application payment registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegisterPayment(Request $request)
    {
        $data = array();
        if($request->has('middleware_error')){
            $data['middleware_error'] = "You haven't added any payment method. Add now to access your account.";
        }
        return view('auth.payment', $data);
    }


    public function getRegisterComplete(Request $request)
    {
        $data = array();
        if($request->session()->get('complete') === 'yes'){
            $data['message'] = "Registration complete. We need to confirm your email. Confirm your email to access your account.";
        } else {
            return response('Unauthorized.', 401);
        }
        return view('auth.confirm', $data);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $this->validator($request->all())->validate();

        $user =  $this->create( $request->all() );

        if(! is_null($request->cookie('refer'))
            && $user->id !== (int) $request->cookie('refer')
            && ! is_null(User::find((int) $request->cookie('refer'))))
        {
            $user->referral_id = (int)$request->cookie('refer');
            $user->save();
        }

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

        $this->guard()->login($user, true);

        return redirect('/influencers/apply/networks');
    }

    /**
     * Handle a registration network request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegisterNetworks(Request $request)
    {

    }

    /**
     * Handle a registration payment request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegisterPayment(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make((array)$request->all(), array(
            'payment_method' => 'required|in:paypal,check,gift_card',
            'payment_method_detail' => 'required'
        ));

        if ($validator->fails()) {
            return redirect('/register/payment')
                ->withErrors($validator)
                ->withInput();
        }

        $payment = new PaymentDetail();
        $payment->user_id = $user->id;
        $payment->method = $request->payment_method;
        $payment->send_to = $request->payment_method_detail;
        $payment->save();

        $email_confirm_code = str_random(64);


        $status = AccountStatus::firstOrNew(['user_id' => (int) $user->id]);
        $status->any_payment_method_added = 'yes';
        $status->email_confirm_code = $email_confirm_code;
        $status->save();

        $shouldSend = true;
        if (!is_null($user->status->email_confirm_send_at)) {
            if ($user->status->email_confirm_send_at->addMinutes(5)->isFuture()) {
                $shouldSend = false;
            } else {
                $user->status->email_confirm_send_at = Carbon::now();
            }
        } else {
            $user->status->email_confirm_send_at = Carbon::now();
        }
        $user->save();

        if ($shouldSend) {
            Mail::send('emails.confirm', ['user' => $user, 'email_confirm_code' => $email_confirm_code], function ($m) use ($user) {
                $m->to($user->email, $user->name)->subject('Your confirmation email!');
            });
        }

        auth()->logout();

        $request->session()->flash('complete', 'yes');
        return redirect('/influencers/apply/complete');
    }


    public function confirmEmail($id, $email_confirm_code)
    {
        $user = User::find((int) $id);
        if($user->status->email_confirm_code === $email_confirm_code)
        {
            $status = AccountStatus::firstOrNew(['user_id' => (int) $user->id]);
            $status->email_confirmed = 'yes';
            $status->save();

            auth()->login($user);

            return view('auth.success');
        } else {
            return view('auth.fail');
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|min:3|max:50|string',
            'lastname'  => 'required|min:3|max:50|string',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|confirmed|min:6|max:50',
            'terms'     => 'accepted',
            'privacy'   => 'accepted',
            'g-recaptcha-response' => 'required|captcha'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstname' => $data['firstname'],
            'lastname'  => $data['lastname'],
            'email'     => strtolower( $data['email'] ),
            'password'  => bcrypt($data['password'])
        ]);
    }


    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
