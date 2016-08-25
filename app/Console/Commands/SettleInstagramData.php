<?php

namespace App\Console\Commands;

use App\Models\InstagramAccountFollower;
use App\Models\InstagramAccountPost;
use App\Models\SocialAccount;
use App\Models\SocialAccountFollower;
use App\Models\SocialAccountPost;
use App\User;
use Illuminate\Console\Command;

class SettleInstagramData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settle:ig_data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data from ig tables to social accounts table.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::with('instagramAccounts')->get();

        $bar = $this->output->createProgressBar(count($users));

        foreach ($users as $u)
        {
            foreach ($u->instagramAccounts as $ig)
            {
                $social_account = SocialAccount::where('account_id', $ig->instagram_id)->where('account', 'instagram')->first();
                if(is_null($social_account))
                {
                    $social_account = new SocialAccount();
                }
                $social_account->user_id = (int) $ig->user_id;
                $social_account->account = 'instagram';
                $social_account->account_id = (int) $ig->instagram_id;
                $social_account->approved = $ig->approved;
                $social_account->username = $ig->username;
                $social_account->name = $ig->full_name;
                $social_account->profile_picture = $ig->profile_picture;
                $social_account->bio = $ig->bio;
                $social_account->website = $ig->website;
                $social_account->followed_by = $ig->followed_by;
                $social_account->follows = $ig->follows;
                $social_account->created_at = $ig->created_at;
                $social_account->updated_at = $ig->updated_at;
                $social_account->save();

                $ig_account_followers = InstagramAccountFollower::where('user_id', $u->id)->where('instagram_id', $social_account->account_id)->get();
                foreach($ig_account_followers as $ig_account_follower)
                {
                    $social_account_follower = SocialAccountFollower::where('social_account_id', $social_account->id)->where('user_id', $u->id)->where('created_at', $ig_account_follower->created_at->toDateTimeString())->first();
                    if(is_null($social_account_follower))
                    {
                        $social_account_follower = new SocialAccountFollower();
                    }
                    $social_account_follower->user_id = (int) $ig->user_id;
                    $social_account_follower->social_account = 'instagram';
                    $social_account_follower->social_account_id = (int) $social_account->id;
                    $social_account_follower->followed_by = $ig_account_follower->followed_by;
                    $social_account_follower->follows = $ig_account_follower->follows;
                    $social_account_follower->deleted_at = $ig_account_follower->deleted_at;
                    $social_account_follower->created_at = $ig_account_follower->created_at;
                    $social_account_follower->updated_at = $ig_account_follower->updated_at;
                    $social_account_follower->save();
                }

                $ig_account_posts = InstagramAccountPost::where('user_id', $u->id)->where('instagram_id', $social_account->account_id)->get();
                foreach($ig_account_posts as $ig_account_post)
                {
                    $social_account_post = SocialAccountPost::where('social_account_id', $social_account->id)->where('user_id', $u->id)->where('media_id', $ig_account_post->media_id)->first();
                    if(is_null($social_account_post))
                    {
                        $social_account_post = new SocialAccountPost();
                    }
                    $social_account_post->user_id = (int) $ig->user_id;
                    $social_account_post->social_account = 'instagram';
                    $social_account_post->social_account_id = (int) $social_account->id;
                    $social_account_post->media_id = $ig_account_post->media_id;
                    $social_account_post->url = $ig_account_post->url;
                    $social_account_post->image = $ig_account_post->image;
                    $social_account_post->caption = $ig_account_post->caption;
                    $social_account_post->likes = $ig_account_post->likes;
                    $social_account_post->comments = $ig_account_post->comments;
                    $social_account_post->created_time = $ig_account_post->created_time;
                    $social_account_post->created_at = $ig_account_post->created_at;
                    $social_account_post->updated_at = $ig_account_post->updated_at;
                    $social_account_post->save();
                }
            }

            $bar->advance();
        }
        $bar->finish();
        $this->info('');
        $this->info('Task completed');
    }
}
