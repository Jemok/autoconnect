<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/14/18
 * Time: 9:40 AM
 */

namespace App\Repositories;


use App\AdStatus;
use App\VehicleDetail;
use App\VehiclePayment;

class AdStatusRepository
{
    public function storeAdStatus(VehicleDetail $vehicleDetail,
                                  $status,
                                  $start,
                                  $stop){

        $this->deActivateOthers($vehicleDetail->id);

        if(AdStatus::where('vehicle_detail_id', $vehicleDetail->id)
            ->exists()){

            $adStatus = AdStatus::where('vehicle_detail_id', $vehicleDetail->id)
                ->firstOrFail();

            $adStatus->status = $status;
            $adStatus->start = $start;
            $adStatus->stop = $stop;
            $adStatus->vehicle_detail_id = $vehicleDetail->id;

            $adStatus->save();

            return $adStatus;
        }

        $adStatus = new AdStatus();

        $adStatus->status = $status;
        $adStatus->start = $start;
        $adStatus->stop = $stop;
        $adStatus->vehicle_detail_id = $vehicleDetail->id;

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

    public function indexForVehicle($vehicleDetailId){

        return AdStatus::where('vehicle_detail_id', $vehicleDetailId)->latest()->get();
    }

    public function countActiveAds(){

        return AdStatus::where('status', 'active')->count();
    }

    public function countExpiredAds(){

        return AdStatus::where('status', 'inactive')->count();
    }

    public function indexExpiredAds(){

        return AdStatus::where('status', 'inactive')->get();
    }
}