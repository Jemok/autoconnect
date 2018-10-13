<?php

namespace App\Http\Controllers;

use App\Notifications\SetAsNotVerifiedNotification;
use App\Notifications\SetAsVerifiedNotification;
use App\Repositories\VehicleDetailRepository;
use App\Repositories\VehicleVerificationsRepository;
use Illuminate\Http\Request;

class VehicleVerificationController extends Controller
{
    public function setAsVerified($vehicleId,
                                  VehicleDetailRepository $vehicleDetailRepository,
                                  VehicleVerificationsRepository $vehicleVerificationsRepository){

        $vehicleDetail = $vehicleDetailRepository->show($vehicleId);

        $vehicleVerificationsRepository->store($vehicleDetail, 'verified');

        $contact = $vehicleDetail->vehicle_contact;

        $contact->notify(new SetAsVerifiedNotification($vehicleDetail, $contact));

        flash()->overlay('The Vehicle Ad has been Verified', 'Success');

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
