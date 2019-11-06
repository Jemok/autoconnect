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

    public function showForBulk($userBulkImportId){

        if(BulkAd::where('user_bulk_import_id', $userBulkImportId)->exists()){

            return BulkAd::where('user_bulk_import_id', $userBulkImportId)->firstOrFail();
        }

        return false;
    }

    public function showFromVehicleDetail($vehicleDetailId){

        return BulkAd::where('vehicle_detail_id', $vehicleDetailId)->firstOrFail();
    }

    public function store($vehicle_detail_id,
                          $ad_status_id,
                          $bulk_import_id,
                          $user_bulk_import_id,
                          $user_id){

        $bulk_ad = new BulkAd();

        $bulk_ad->vehicle_detail_id = $vehicle_detail_id;
        $bulk_ad->ad_status_id = $ad_status_id;
        $bulk_ad->bulk_import_id = $bulk_import_id;
        $bulk_ad->user_bulk_import_id = $user_bulk_import_id;
        $bulk_ad->user_id = $user_id;

        $bulk_ad->save();

        return $bulk_ad;
    }

    public function moveAdsOnline($bulkImportId, $bulk_import){

        $bulk_ads = BulkAd::where('bulk_import_id', $bulkImportId)->get();

        foreach ($bulk_ads as $bulk_ad){

            $ad_status = $bulk_ad->ad_status;

            $ad_status->status = 'online';
            $ad_status->user_id = $bulk_import->user_id;
            $ad_status->ad_type = $bulk_ad->ad_type;

            $ad_status->save();
        }

    }

    public function checkIfBulkAdExists($bulkImportId){

        if(BulkAd::where('bulk_import_id', $bulkImportId)->exists()){
            return true;
        }

        return false;
    }
}