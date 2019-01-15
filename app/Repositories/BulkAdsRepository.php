<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/15/19
 * Time: 5:54 AM
 */

namespace App\Repositories;


use App\BulkAd;

class BulkAdsRepository
{
    public function store($vehicle_detail_id,
                          $ad_status_id,
                          $bulk_import_id,
                          $user_bulk_import_id){

        $bulk_ad = new BulkAd();

        $bulk_ad->vehicle_detail_id = $vehicle_detail_id;
        $bulk_ad->ad_status_id = $ad_status_id;
        $bulk_ad->bulk_import_id = $bulk_import_id;
        $bulk_ad->user_bulk_import_id = $user_bulk_import_id;

        $bulk_ad->save();

        return $bulk_ad;
    }
}