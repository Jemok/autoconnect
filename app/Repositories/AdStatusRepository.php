<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/14/18
 * Time: 9:40 AM
 */

namespace App\Repositories;


use App\AdStatus;
use App\BulkAd;
use App\VehicleDetail;
use App\VehiclePayment;

class AdStatusRepository
{
    public function storeAdStatus(VehicleDetail $vehicleDetail,
                                  $status,
                                  $start,
                                  $stop,
                                  $user_id,
                                  $type){

        $this->deActivateOthers($vehicleDetail->id);

        if(AdStatus::where('vehicle_detail_id', $vehicleDetail->id)
            ->exists()){

            $adStatus = AdStatus::where('vehicle_detail_id', $vehicleDetail->id)
                ->firstOrFail();

            $adStatus->status = $status;
            $adStatus->start = $start;
            $adStatus->stop = $stop;
            $adStatus->type = $type;
            $adStatus->vehicle_detail_id = $vehicleDetail->id;
            $adStatus->user_id = $user_id;

            $adStatus->save();

            return $adStatus;
        }

        $adStatus = new AdStatus();

        $adStatus->status = $status;
        $adStatus->start = $start;
        $adStatus->stop = $stop;
        $adStatus->type = $type;
        $adStatus->vehicle_detail_id = $vehicleDetail->id;
        $adStatus->user_id = $user_id;

        $adStatus->save();

        return $adStatus;
    }

    public function deActivateOthers($vehicleId){

        $adstatuses = AdStatus::where('vehicle_detail_id', $vehicleId)
            ->where('status', 'active')
            ->get();

        foreach ($adstatuses as $adstatus){
            $adstatus->status = 'inactive';

            $adstatus->save();
        }
    }

    public function setAdAsDeclined($userBulkImportId){

        $bulk_ad = BulkAd::where('user_bulk_import_id', $userBulkImportId)->firstOrFail();

        $ad_status = $bulk_ad->ad_status;

        $ad_status->status = 'declined';

        $ad_status->save();
    }

    public function indexForVehicle($vehicleDetailId){

        return AdStatus::where('vehicle_detail_id', $vehicleDetailId)->latest()->get();
    }

    public function countActiveAds(){

        return AdStatus::where('status', 'online')->count();
    }

    public function countUserActiveAds($userId){

        return AdStatus::where('user_id', $userId)
            ->where('status', 'online')
            ->count();
    }

    public function countUserPendingAds($userId){

        return AdStatus::where('user_id', $userId)
            ->where('status', 'pending_verification')
            ->count();
    }

    public function countUserDeclinedAds($userId){

        return AdStatus::where('user_id', $userId)
            ->where('status', 'declined')
            ->count();
    }

    public function countUserExpiredAds($userId){

        return AdStatus::where('user_id', $userId)
            ->where('status', 'expired')
            ->count();
    }

    public function countDealerActiveAds(){

    }

    public function countExpiredAds(){

        return AdStatus::where('status', 'inactive')->count();
    }

    public function countDeclinedAds(){

        return AdStatus::where('status', 'declined')->count();
    }

    public function indexExpiredAds(){

        return AdStatus::where('status', 'inactive')->get();
    }


    /**
     * @return mixed
     */
    public function indexPendingVerificationAds(){

        return AdStatus::where('status', 'pending_verification')->get();
    }

    public function indexOnlineAds(){

        return AdStatus::where('status', 'online')->get();
    }

    /**
     * @return mixed
     */
    public function countPendingVerificationAds(){

        return AdStatus::where('status', 'pending_verification')->count();
    }
}