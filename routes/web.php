<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Track Controller
Route::get('/track/postback/{veri_slot}', 'TrackController@postback');
Route::get('/track/{campaign_id}/{user_id}/{subid1?}/{subid2?}/{subid3?}/{subid4?}/{subid5?}', 'TrackController@track')
    ->where(['campaign_id' => '[0-9]+', 'user_id' => '[0-9]+']);


// Routes for guest users
Route::group(['middleware' => 'guest'], function () {
    // Registration routes...
    Route::get('/influencers/apply', 'Auth\RegisterController@getRegister')->name('register');
    Route::post('/influencers/apply', 'Auth\RegisterController@postRegister');

    //Invite Controller
    Route::get('/invite/{id}', 'InviteController@getId');


    // Password Reset Routes...
    $this->get('password/reset/', 'Auth\ForgotPasswordController@showLinkRequestForm');
    $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    $this->post('password/reset', 'Auth\ResetPasswordController@reset');
    $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');

});

Route::get('/influencers/apply/complete', 'Auth\RegisterController@getRegisterComplete');
Route::get('/emailconfirm/{id}/{email_confirm_code}', 'Auth\RegisterController@confirmEmail');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/login/check', 'Auth\LoginController@checkpoint');

    // Registration
    Route::get('/influencers/apply/networks', 'Auth\RegisterController@getRegisterNetworks');
    Route::post('/influencers/apply/networks', 'Auth\RegisterController@postRegisterNetworks');
    Route::post('/influencers/apply/networks/instagram/{username}', 'Auth\RegisterController@handleInstagramVerification');
    Route::get('/influencers/apply/networks/{service}/callback', 'Auth\RegisterController@getRegisterSocialAccount');
    Route::get('/influencers/apply/payment', 'Auth\RegisterController@getRegisterPayment');
    Route::post('/influencers/apply/payment', 'Auth\RegisterController@postRegisterPayment');

    Route::get('/register/facebook/callback', 'Auth\RegisterController@handleFacebookCallback');
    Route::get('/register/twitter/callback', 'Auth\RegisterController@handleTwitterCallback');
    Route::get('/register/{service}/', 'Auth\RegisterController@redirectToProvider');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

//Auth::routes();

Route::group(['middleware' => []], function() {

    // Routes for authenticated users
    Route::group(['middleware' => 'status'], function () {
        // Dashboard
        Route::get('/dashboard', 'User\DashboardController@index');
        // Reports
        Route::get('/reports', 'User\ReportsController@index');
        // Report for specific id
        Route::get('/report/{id}', 'User\ReportsController@show');
//        Route::get('/reach/{id?}', 'User\ReachController@getReach');
//        Route::get('/followers/{id?}', 'User\ReachController@getFollowers');
//        Route::get('/engagements/{id?}/{engagements?}', 'User\ReachController@getEngagements');
        Route::get('/shoutouts', 'UserController@shoutouts');
        Route::get('/payouts', 'UserController@getPayouts');
        Route::post('/payouts', 'UserController@postPayouts');
        Route::get('/campaigns', 'CampaignController@index');

        Route::get('/campaign/{id}', 'CampaignController@show');

        Route::resource('/contests', 'ContestController');

        // Invite
        Route::get('/invite', 'InviteController@index');

        //Promote
        Route::get('/promote', 'User\PromoteController@index');
        Route::get('/promote/{id}', 'User\PromoteController@show');

        Route::get('/networks', 'User\PromoteController@networks');

        //Settings
        Route::get('/settings/', 'User\SettingsController@index');
        Route::get('/settings/password', 'User\SettingsController@password');
        Route::post('/settings/password', 'User\SettingsController@updatePassword');
        Route::post('/settings/updateInfo', 'User\SettingsController@updateInfo');
        Route::post('/settings/updateNotifications', 'User\SettingsController@updateNotifications');
        Route::post('/settings/updatePassword', 'User\SettingsController@updatePassword');
        Route::get('/taxdetails', 'UserController@getTaxDetails');
        Route::post('/taxdetails', 'UserController@postTaxDetails');
    });

    // No middlewares. Anyone can access
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/contact', 'HomeController@getContact');
    Route::post('/contact', 'HomeController@postContact');
    Route::get('/influencers', 'HomeController@influencers');
    Route::get('/advertisers', 'HomeController@advertisers');
    Route::get('/about', 'HomeController@about');
    Route::get('/rewards', 'HomeController@rewards');
    Route::get('/faqs', 'HomeController@faqs');
    Route::get('/privacy', 'HomeController@privacy');
    Route::get('/terms', 'HomeController@terms');

    // Campaign Controller
    Route::get('/campaign/gallery/image/{id}/{filename}', 'Admin\CampaignGalleryController@showImage');
    Route::get('/campaign/image/{name}', 'Admin\CampaignController@featureImage');

    Route::get('/promote/image/{id}', 'User\PromoteController@featureImage');

});




// Only admin and owner has access
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    // Admin
    Route::get('/', 'Admin\AdminController@index');

    Route::resource('/postbacks', 'Admin\PostbackController');
    Route::get('/postbacks/{id}/delete', 'Admin\PostbackController@destroy');

    // Campaigns
    Route::get('/campaigns/categories', 'Admin\CampaignController@categories');
    Route::get('/campaigns/rates', 'Admin\CampaignController@getRates');
    Route::post('/campaigns/rates', 'Admin\CampaignController@postRates');
    Route::put('/campaigns/rates', 'Admin\CampaignController@putRates');
    Route::get('/campaigns/subidblock', 'Admin\CampaignController@subidblock');
    Route::get('/campaigns/singleblock', 'Admin\CampaignController@singleblock');
    Route::get('/campaigns/networkblock', 'Admin\CampaignController@networkblock');
    Route::get('/campaigns/gallery/image/{id}/{filename}/delete', 'Admin\CampaignGalleryController@destroy');
    Route::resource('/campaigns/gallery', 'Admin\CampaignGalleryController',
        ['only' => ['edit', 'update', 'show']]);
    Route::resource('/campaigns', 'Admin\CampaignController');

    // Campaign Reports
    Route::get('/reports/options/{id}/{status}', 'Admin\ReportsController@options');
    Route::resource('/reports', 'Admin\ReportsController');


    Route::get('/payments', 'Admin\PaymentController@index');
    Route::post('/payments', 'Admin\PaymentController@generate');


    //Promotion Controller
    Route::get('/promotions/categories', 'Admin\CategoryController@index');
    Route::post('/promotions/categories', 'Admin\CategoryController@store');
    Route::get('/promotions/delete/{id}', 'Admin\CategoryController@destroy');


    Route::get('/promotions/{id}/edit/', 'Admin\PromotionController@edit');
    Route::put('/promotions/{id}', 'Admin\PromotionController@update');

    Route::resource('/promotions/', 'Admin\PromotionController');

    Route::get('/promotions/edit', 'Admin\PromotionController@edit');
    Route::get('/promotions/creatives', 'Admin\PromotionController@creatives');
    Route::get('/promotions/creatives/upload', 'Admin\PromotionController@creativesupload');

    //Rewards
    Route::resource('/rewards', 'Admin\RewardsController');

});




Route::group(['prefix' => 'api/admin', 'middleware' => ['api', 'admin']], function () {
    Route::get('/stats', 'Admin\Api\AdminController@index');
    Route::get('/publishers/my', 'Admin\Api\PublisherController@my');
    Route::resource('/publishers', 'Admin\Api\PublisherController');
    Route::post('/publishers/approval/{id}', 'Admin\Api\PublisherController@approval');

    // Campaign Reports
    Route::get('/reports/options/{id}/{status}', 'Admin\Api\ReportsController@options');
    Route::resource('/reports', 'Admin\Api\ReportsController');

    //Social Account controller
    Route::post('/socialaccounts/approval/{account_id}', 'Admin\Api\SocialAccountsController@approval');
    Route::resource('/socialaccounts', 'Admin\Api\SocialAccountsController');

    Route::resource('/socialposts', 'Admin\Api\SocialAccountsController');

    // Contests Controller
    Route::resource('/contests', 'Admin\Api\ContestController');


    Route::resource('/campaigns', 'Admin\Api\CampaignController');
});

Route::get('/test', function()
{
    auth()->logout();
    auth()->loginUsingId(1);
});
