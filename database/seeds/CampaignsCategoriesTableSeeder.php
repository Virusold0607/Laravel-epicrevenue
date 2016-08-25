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
//        $data = array(
//            'Actor' , 'Adult' , 'Animals' , 'Art & Design' , 'Beauty' , 'Black & White' , 'Blogger/Editor' , 'Car' , 'Celebrity' , 'Collage' , 'College Student' , 'Colorful' , 'Comedy' , 'Contacts' , 'Contemporary' , 'DIY' , 'DJ' , 'Entertainment' , 'Entrepreneur' , 'Facial Hair' , 'Family' , 'Fashion' , 'Finance' , 'Fitness' , 'Flat Lay' ,
//            'Food' , 'Gaming' , 'Glasses' , 'Graffiti' , 'Health' , 'Illustrations/Graphics' , 'Interior' , 'LGBT' , 'Lifestyle' , 'Magic' , 'Married' , 'Model' , 'Motorcycle' , 'Music' , 'Musician' , 'Nightlife' , 'Photographer' , 'Photography' , 'Poker' , 'Repost Account' , 'Restaurateur/Catering' , 'Sommelier' , 'Sport' , 'Stop Motion' ,
//            'Stylist/Designer' , 'Tech' , 'Teen' , 'Travel' , 'Viner' , 'Wedding' , 'Youtuber' , 'Alternative' , 'Anime' , 'Bohemian' , 'High Fashion' , 'Jewelry' , 'Mens Fashion' , 'Plus Size' , 'Sexy' , 'Streetwear' , 'Swimwear' , 'Vintage' , 'Watches' , 'Architecture' , 'Beach' , 'City' , 'Outdoors' , 'People' ,
//            'Winter' , 'Baseball' , 'Basketball' , 'BMX' , 'Bowling' , 'Boxing' , 'Cheerleading' , 'Combat Sports' , 'Crossfit' , 'Cycling' , 'Dance' , 'Figure Skating' , 'Fishing' , 'Football' , 'Free Running/Parkour' , 'Golf' , 'Gymnastics' , 'Hockey' , 'Hunting' , 'Ice Skating' , 'Lacrosse' , 'MMA' , 'Motocross' , 'Polo' , 'Racing' ,
//            'Rock Climbing' , 'Rugby' , 'Skateboarding' , 'Skiing' , 'Skydiving' , 'Snowboarding' , 'Snowmobiling' , 'Soccer' , 'Surfing' , 'Swimming' , 'Tennis' , 'Track & Field' , 'Volleyball' , 'Weightlifting' , 'Wrestling' , 'Yoga/Pilates' , 'Cat' , 'Dog' , 'Wild Animals' , 'Dad' , 'Kids' , 'Mom' , 'Dessert' , 'Gourmet' , 'Vegetarian' ,
//            'EDM/Raver' , 'Guitar' , 'Hip Hop' , 'Piano' , 'Pop' , 'Hair' , 'Make Up' , 'Nails' , 'Tattoo'
//        );
//
//        foreach($data as $c)
//        {
//            $cc = new CampaignsCategory();
//            $cc->name = $c;
//            $cc->save();
//        }


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
