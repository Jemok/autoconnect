<?php

namespace App\Http\Controllers;

use App\Notifications\SetAsNotVerifiedNotification;
use App\Notifications\SetAsVerifiedNotification;
use App\Repositories\AdStatusRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\VehicleDetailRepository;
use App\Repositories\VehicleVerificationsRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VehicleVerificationController extends Controller
{
    public function setAsVerified($vehicleId,
                                  VehicleDetailRepository $vehicleDetailRepository,
                                  VehicleVerificationsRepository $vehicleVerificationsRepository,
                                  PaymentRepository $paymentRepository,
                                  AdStatusRepository $adStatusRepository){

        $vehicleDetail = $vehicleDetailRepository->show($vehicleId);

        $checkPayment = $paymentRepository->checkAtLeastOnePayment($vehicleId);

        if($checkPayment){
            $vehicleVerificationsRepository->store($vehicleDetail, 'verified');

            $start = Carbon::now();

            $stop = Carbon::now()->addDays(30);

            $ad_status = $adStatusRepository->setAdAsOnline($vehicleId, $start, $stop);

            $adStatusRepository->storeAdPeriod($vehicleDetail,
                $ad_status,
                'active',
                $start,
                $stop);

            $vehicleDetailRepository->activateVehicle($vehicleDetail->id);

            $contact = $vehicleDetail->vehicle_contact;

            $contact->notify(new SetAsVerifiedNotification($vehicleDetail, $contact));

            flash()->overlay('The Vehicle Ad has been Verified', 'Success');

            return redirect()->back();
        }

        flash()->overlay('A payment has not been made for this Ad', 'Payment Not Made');

        return redirect()->back();
    }

    public function setAsNotVerified($vehicleId,
                                     VehicleDetailRepository $vehicleDetailRepository,
                                     VehicleVerificationsRepository $vehicleVerificationsRepository){

        $vehicleDetail = $vehicleDetailRepository->show($vehicleId);

        $vehicleVerificationsRepository->store($vehicleDetail, 'not_verified');

        $contact = $vehicleDetail->vehicle_contact;

        $contact->notify(new SetAsNotVerifiedNotification($vehicleDetail, $contact));

        flash()->overlay('The Vehicle Ad has been set to Not Verified', 'Success');

        return redirect()->back();
    }


}
