<?php

namespace App\Console\Commands;

use App\Models\InstagramAccountFollower;
use Illuminate\Console\Command;
use App\User;
use App\Models\InstagramAccount;
use MetzWeb\Instagram\Instagram;

class InstagramFollowsStore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instagram:follows';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store daily count followed_by and follows details for all instagram users we have.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->instagram = new Instagram(array(
            'apiKey'      => env('INSTAGRAM_KEY'),
            'apiSecret'   => env('INSTAGRAM_SECRET'),
            'apiCallback' => env('INSTAGRAM_CALLBACK')
        ));
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $instagram = $this->instagram;
        $instagram->setSignedHeader(true);

        $users = User::with('instagramaccounts')->get();

        $bar = $this->output->createProgressBar(count($users));

        foreach($users as $u)
        {
            foreach($u->instagramaccounts as $instagramAccount)
            {
                $instagram->setAccessToken($instagramAccount->access_token);
                $user = $instagram->getUser();

                $this->updateAccountDetails($instagram, $instagramAccount, $user);

                if((int) $user->meta->code === 200)
                {
                    $follow = new InstagramAccountFollower();
                    $follow->user_id      = $u->id;
                    $follow->instagram_id = $user->data->id;
                    $follow->followed_by  = $user->data->counts->followed_by;
                    $follow->follows      = $user->data->counts->follows;
                    $follow->save();
                }
            }
            $bar->advance();
        }

        $bar->finish();
        $this->info('');

    }



    /*
     * Update Instagram account details.
     *
     */
    private function updateAccountDetails(Instagram $instagram, InstagramAccount $instagramAccount, $user)
    {
        if((int) $user->meta->code === 200)
        {
            $instagramAccount->instagram_id = $user->data->id;
            $instagramAccount->profile_picture = $user->data->profile_picture;
            $instagramAccount->username = $user->data->username;
            $instagramAccount->bio = $user->data->bio;
            $instagramAccount->website = $user->data->website;
            $instagramAccount->full_name = $user->data->full_name;
            $instagramAccount->followed_by = $user->data->counts->followed_by;
            $instagramAccount->follows     = $user->data->counts->follows;
            $instagramAccount->save();
        }
        return;
    }
}
