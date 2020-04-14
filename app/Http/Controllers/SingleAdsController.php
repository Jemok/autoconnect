<?php

namespace App\Http\Controllers;

use App\AdStatus;
use App\Http\Requests\SetBulkVehicleAsNotApprovedRequest;
use App\Notifications\AdActivatedNotification;
use App\Notifications\AdDisapprovedNotification;
use App\Notifications\SingleAdDisapprovalNotification;
use App\Repositories\AdStatusRepository;
use App\Repositories\BulkImportRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\SingleAdsRepository;
use App\Repositories\UsersRepository;
use App\Repositories\VehicleDetailRepository;
use App\Repositories\VehicleImagesRepository;
use Carbon\Carbon;

class SingleAdsController extends Controller
{
    public function index(SingleAdsRepository $singleAdsRepository){

        $single_ads = $singleAdsRepository->index();

        return view('single-ads.index', compact('single_ads'));
    }

    public function indexImages($vehicleId,
                                VehicleDetailRepository $vehicleDetailRepository,
                                VehicleImagesRepository $vehicleImagesRepository,
                                BulkImportRepository $bulkImportRepository){

        $vehicle_detail = $vehicleDetailRepository->show($vehicleId);

        $vehicle_images = $vehicleImagesRepository->indexForVehicle($vehicleId);

        $other_features = json_decode($vehicle_detail->other_features, true);

        $disapproval_reasons = $bulkImportRepository->getDisapprovalReasonsNotResolvedOrCorrected($vehicleId);

        $ad_status = AdStatus::where('vehicle_detail_id', $vehicle_detail->id)->firstOrFail();

        return view('single-ads.index-images-design', compact(
            'disapproval_reasons',
            'vehicleId',
            'vehicle_detail',
            'vehicle_images',
            'other_features',
        'ad_status'));
    }

    public function activateAd($vehicleId,
                               $vehiclePaymentId,
                               VehicleDetailRepository $vehicleDetailRepository,
                               PaymentRepository $paymentRepository,
                               AdStatusRepository $adStatusRepository,
                               UsersRepository $usersRepository){

        $vehicle_detail = $vehicleDetailRepository->show($vehicleId);

        $contact = $vehicle_detail->vehicle_contact;

        $vehicle_payment = $paymentRepository->show($vehiclePaymentId);

        $start = Carbon::now();

        $stop = Carbon::now()->addDays(30);

        if($vehicle_payment->package == 'standard'){

            $package = 'Standard';

        }elseif ($vehicle_payment->package == 'premium'){

            $package = 'Premium';
        }

        $user = $usersRepository->showUsingId(Auth::user()->id);

        $ad_status = $adStatusRepository->storeAdStatus($vehicle_detail,
            'pending_verification',
            $start,
            $stop,
            $user->id,
            'single',
            $vehicle_payment->package);

//        $adStatusRepository->storeAdPeriod($vehicle_detail,
//            $ad_status,
//            'active',
//            $start,
//            $stop);

        $contact->notify(new AdActivatedNotification($contact,
            $vehicle_detail,
            $start->toDateString(),
            $stop->toDateString(),
            $vehicle_payment,
            $package));

        flash()->overlay('The Ad has been created, Start : '. $start->toDateString(). ' Stop : '. $stop->toDateString(), 'Success');

        return redirect()->back();
    }

    public function showSingleDisapprovalPage($vehicleDetailId,
                                              VehicleDetailRepository $vehicleDetailRepository){

        $vehicle_detail = $vehicleDetailRepository->show($vehicleDetailId);

        return view('single-ads.set-as-not-approved', compact('vehicle_detail', 'vehicleDetailId'));
    }

    public function setSingleVehicleAsNotApproved($vehicleDetailId,
                                                  $status,
                                                  SetBulkVehicleAsNotApprovedRequest $setBulkVehicleAsNotApprovedRequest,
                                                  VehicleDetailRepository $vehicleDetailRepository,
                                                  AdStatusRepository $adStatusRepository){

        $vehicle_detail = $vehicleDetailRepository->show($vehicleDetailId);

        $ad_status = $adStatusRepository->showFromVehicleDetail($vehicleDetailId);

        $vehicleDetailRepository->saveDisapprovalReason('single', $vehicle_detail, $setBulkVehicleAsNotApprovedRequest->reason, 'not_resolved');

        $adStatusRepository->setSingleAdAsDeclined($vehicleDetailId);

        $user = $ad_status->user;

        $user->notify(new SingleAdDisapprovalNotification($vehicle_detail, $setBulkVehicleAsNotApprovedRequest->reason));

        flash()->overlay('The car Ad was rejected and the reason was sent to the user successfully', 'Effected');

        return redirect()->route('indexSingleAdsImages', $vehicleDetailId);
    }
}
