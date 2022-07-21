<?php

use Illuminate\Database\Seeder;
use App\Models\CampaignsCategory;
use App\Models\PromotionCategory;

class CampaignsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cc = CampaignsCategory::firstOrNew(['name' => 'Adult']);
        $cc->save();

        $cc = CampaignsCategory::firstOrNew(['name' => 'Android Apps']);
        $cc->save();

        $cc = CampaignsCategory::firstOrNew(['name' => 'Downloads']);
        $cc->save();

        $cc = CampaignsCategory::firstOrNew(['name' => 'Email Submits']);
        $cc->save();

        $cc = CampaignsCategory::firstOrNew(['name' => 'Fitness / Health']);
        $cc->save();

        $cc = CampaignsCategory::firstOrNew(['name' => 'iOS Apps']);
        $cc->save();

        $cc = CampaignsCategory::firstOrNew(['name' => 'Mobile Apps']);
        $cc->save();

        $cc = CampaignsCategory::firstOrNew(['name' => 'Products']);
        $cc->save();

        $cc = CampaignsCategory::firstOrNew(['name' => 'Registration']);
        $cc->save();

        $cc = CampaignsCategory::firstOrNew(['name' => 'Travel']);
        $cc->save();

        $cc = CampaignsCategory::firstOrNew(['name' => 'Trials']);
        $cc->save();

        $p = PromotionCategory::firstOrNew(['name' => 'Sweepstakes/Giveaways']);
        $p->save();

        $p = PromotionCategory::firstOrNew(['name' => 'Hacks & Tricks']);
        $p->save();

        $p = PromotionCategory::firstOrNew(['name' => 'Dating']);
        $p->save();
    }
}
