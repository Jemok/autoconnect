<?php

namespace App\Http\Controllers;

use App\Notifications\AdExpiredNotification;
use App\Repositories\AdStatusRepository;
use App\Repositories\BulkAdsRepository;
use App\Repositories\DealerProfileRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\VehicleDetailRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdsManagementController extends Controller
{
    public function manageVehicleAd($vehicleId,
                                    VehicleDetailRepository $vehicleDetailRepository,
                                    PaymentRepository $paymentRepository,
                                    AdStatusRepository $adStatusRepository){

        $vehicle_detail = $vehicleDetailRepository->show($vehicleId);


        $vehicle_payments = $paymentRepository->indexForVehicle($vehicleId);

        $ads = $adStatusRepository->indexForVehicle($vehicleId);

        return view('single-ads.manage-design', compact('vehicle_detail',
            'vehicle_payments',
            'ads'));
    }

    public function indexOnlineAds(DealerProfileRepository $dealerProfileRepository){

        $check_if_profile_exists  = $dealerProfileRepository->checkIfUserProfileExists(Auth::user()->id);


        return view('ads.admin.index-online', compact('check_if_profile_exists'));
    }

    public function indexDealerOnlineAds(DealerProfileRepository $dealerProfileRepository){

        $check_if_profile_exists  = $dealerProfileRepository->checkIfUserProfileExists(Auth::user()->id);

        return view('ads.dealer.index-online', compact('check_if_profile_exists'));
    }

    public function indexPendingVerificationAds(DealerProfileRepository $dealerProfileRepository){

        $check_if_profile_exists  = $dealerProfileRepository->checkIfUserProfileExists(Auth::user()->id);

        return view('ads.admin.index-pending-verification', compact('dealerProfileRepository'));
    }

    public function indexDealerPendingVerificationAds(DealerProfileRepository $dealerProfileRepository){

        $check_if_profile_exists  = $dealerProfileRepository->checkIfUserProfileExists(Auth::user()->id);

        return view('ads.dealer.index-pending-verification', compact('check_if_profile_exists'));
    }

    public function indexDeclinedAds(DealerProfileRepository $dealerProfileRepository){

        $check_if_profile_exists  = $dealerProfileRepository->checkIfUserProfileExists(Auth::user()->id);

        return view('ads.admin.index-declined', compact('check_if_profile_exists'));
    }

    public function indexDealerDeclinedAds(DealerProfileRepository $dealerProfileRepository){

        $check_if_profile_exists  = $dealerProfileRepository->checkIfUserProfileExists(Auth::user()->id);

        return view('ads.dealer.index-declined', compact('check_if_profile_exists'));
    }

    public function indexExpiredAds(DealerProfileRepository $dealerProfileRepository){

        $check_if_profile_exists  = $dealerProfileRepository->checkIfUserProfileExists(Auth::user()->id);

        return view('ads.admin.index-expired', compact('check_if_profile_exists'));
    }

    public function indexExpiredAdsForDealer(DealerProfileRepository $dealerProfileRepository){

        $check_if_profile_exists  = $dealerProfileRepository->checkIfUserProfileExists(Auth::user()->id);

        return view('ads.dealer.index-expired', compact('check_if_profile_exists'));
    }

    public function expireAd($vehicleDetailId,
                             AdStatusRepository $adStatusRepository,
                             BulkAdsRepository $bulkAdsRepository,
                             VehicleDetailRepository $vehicleDetailRepository){

        $bulk_ad = $bulkAdsRepository->showForBulk($vehicleDetailId);

        $adStatusRepository->expireAd($bulk_ad->vehicle_detail_id);

        $vehicle_detail = $vehicleDetailRepository->show($bulk_ad->vehicle_detail_id);

        $user = $bulk_ad->user;

        $user->notify(new AdExpiredNotification($vehicle_detail));

        $vehicleDetailRepository->deactivateVehicle($bulk_ad->vehicle_detail_id);

        flash()->overlay('Ad Was Expired', 'Ad Expired');

        return redirect()->back();
    }

    public function expireSingleAd($vehicleDetailId,
                                   AdStatusRepository $adStatusRepository,
                                   VehicleDetailRepository $vehicleDetailRepository){

        $adStatusRepository->expireAd($vehicleDetailId);

        $vehicleDetailRepository->deactivateVehicle($vehicleDetailId);

        $vehicle_detail = $vehicleDetailRepository->show($vehicleDetailId);

        $user = $vehicle_detail->vehicle_contact;

        $user->notify(new AdExpiredNotification($vehicle_detail));

        flash()->overlay('Ad Was Expired', 'Ad Expired');

        return redirect()->back();
    }
}
