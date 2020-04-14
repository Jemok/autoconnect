<?php

namespace App\Console\Commands;

use App\AdPeriod;
use App\AdStatus;
use Carbon\Carbon;
use Illuminate\Console\Command;

class StopAdsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ads:stop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stop Ads Commands';

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
        $online_ads = AdPeriod::where('status', 'active')->get();

        foreach ($online_ads as $online_ad){

            if(Carbon::now() > $online_ad->stop){

                $online_ad->status = 'inactive';

                $online_ad->save();

                $ad_status = AdStatus::where('vehicle_detail_id', $online_ad->vehicle_detail_id)
                                       ->where('status', 'online')
                                       ->firstOrFail();

                $ad_status->status = 'expired';

                $ad_status->save();
            }

        }
    }
}
