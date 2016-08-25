<?php

namespace App\Console\Commands;

use App\Models\InstagramAccountPost;
use Illuminate\Console\Command;
use App\User;
use App\Models\InstagramAccount;
use MetzWeb\Instagram\Instagram;

class InstagramPostsStore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instagram:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store all instagram posts associated with a user.';

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

                $this->updateAccountDetails($instagram, $instagramAccount);

                $posts = $instagram->getUserMedia();

                if((int) $posts->meta->code === 200)
                {
                    foreach ($posts->data as $p) {
                        $post = InstagramAccountPost::where('media_id', $p->id)->first();
                        if(is_null($post)) {
                            $post = new InstagramAccountPost();
                        }

                        $post->user_id      = $u->id;
                        $post->instagram_id = $p->user->id;
                        $post->media_id     = $p->id;
                        $post->image        = $p->images->low_resolution->url;
                        $post->url          = $p->link;
                        if(is_object($p->caption))
                            $post->caption      = $p->caption->text;
                        else
                            $post->caption      = $p->caption;
                        $post->likes        = $p->likes->count;
                        $post->comments     = $p->comments->count;
                        $post->created_time = date("Y-m-d H:i:s", $p->created_time);
                        $post->save();

                        $ids[] = $p->id;
                    }
                }
            }
            $bar->advance();
        }

        if(isset($ids))
            InstagramAccountPost::whereNotIn('media_id', $ids)->forceDelete();

        $bar->finish();
        $this->info('');
    }


    /*
     * Update Instagram account details.
     *
     */
    private function updateAccountDetails(Instagram $instagram, InstagramAccount $instagramAccount)
    {
        $user = $instagram->getUser();
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
