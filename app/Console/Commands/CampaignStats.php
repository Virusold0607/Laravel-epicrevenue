<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Campaign;
use App\Models\CampaignStats as Stats;
use Carbon\Carbon;

class CampaignStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'campaigns:stats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cron to sync daily campaigns stats';

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
        $this->all();
    }


    private function lastDay()
    {
        $date = Carbon::yesterday();

        $campaigns = Campaign::where('created_at','<', $date->toDateTimeString())->get();

        $bar = $this->output->createProgressBar(count($campaigns));    

        foreach($campaigns as $campaign)
        {
            $stats = Stats::where('campaign_id', (int) $campaign->id)->where('date', $date->toDateTimeString())->first();
            if(is_null($stats))
                $stats = new Stats();

            $stats->campaign_id = (int) $campaign->id;
            $stats->clicks = $campaign->reports()->date($date)->click()->count();
            $stats->leads = $stats->clicks + $campaign->reports()->date($date)->lead()->count();
            $stats->date = $date->toDateString();

            $q = ($stats->clicks);
            if($q == 0)
                $q = 1;
            $stats->cr = ($stats->leads / $q)  * 100;
            $stats->save();

            $bar->advance();            
        }

        $bar->finish();
    }


    private function all()
    {
        $date = Carbon::yesterday();

        $bar = $this->output->createProgressBar(800);    
        for($i = 800; $i >= 1; $i--)
        {
            $date = Carbon::today()->subDays($i);

            $campaigns = Campaign::where('created_at','<', $date->toDateTimeString())->get();

            foreach($campaigns as $campaign)
            {
                $stats = Stats::where('campaign_id', (int) $campaign->id)->where('date', $date->toDateTimeString())->first();
                if(is_null($stats))
                    $stats = new Stats();

                $stats->campaign_id = (int) $campaign->id;
                $stats->clicks = $stats->leads + $campaign->reports()->date($date)->click()->count();
                $stats->leads = $campaign->reports()->date($date)->lead()->count();
                $stats->date = $date->toDateString();

                $q = ($stats->clicks);
                if($q == 0)
                    $q = 1;
                $stats->cr = ($stats->leads / $q)  * 100;
                $stats->save();
                
            }

            $bar->advance();

        }

        $bar->finish();
    }
}
