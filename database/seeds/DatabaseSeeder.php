<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CampaignsCategoriesTableSeeder::class);
        $this->call(PostbacksTableSeeder::class);

        $roles = ["Administrator", "Moderator", "Designer", "Advertiser", "Influencer"];
        foreach ($roles as $role) {
            $r = \App\Models\Role::where('name', $role)->first();
            if(is_null($r))
                \App\Models\Role::create(['name' => $role]);
        }

        Model::reguard();
    }
}
