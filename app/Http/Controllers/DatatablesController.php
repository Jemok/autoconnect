<?php

namespace App\Http\Controllers;

use App\Repositories\AdStatusRepository;
use App\Repositories\BulkImportRepository;
use App\Repositories\SingleAdsRepository;
use App\Repositories\VehicleVerificationsRepository;
use Yajra\DataTables\Facades\DataTables;


class DatatablesController extends Controller
{
    public function indexOnlineAds(SingleAdsRepository $singleAdsRepository){

        $single_ads = $singleAdsRepository->index();

        return Datatables::of($single_ads)
            ->addColumn('id', function ($single_ad){

                return $single_ad->id;
            })
            ->addColumn('car_make', function ($single_ad){

                return $single_ad->car_make->name;
            })
            ->addColumn('car_model', function ($single_ad){

                return $single_ad->car_model->name;
            })
            ->addColumn('year', function ($single_ad){

                return $single_ad->year;
            })
            ->addColumn('mileage', function ($single_ad){

                return $single_ad->mileage;
            })
            ->addColumn('body_type', function ($single_ad){

                return $single_ad->body_type->name;
            })
            ->addColumn('transmission_type', function ($single_ad){

                return $single_ad->transmission_type->name;
            })
            ->addColumn('car_condition', function ($single_ad){

                return $single_ad->car_condition->name;
            })
            ->addColumn('duty', function ($single_ad){

                return $single_ad->duty->name;
            })
            ->addColumn('price', function ($single_ad){

                return $single_ad->price;
            })
            ->addColumn('negotiable', function ($single_ad){

                if($single_ad->negotiable_price == 'allowed'){
                    return 'Negotiable';
                }else{
                    return 'Not Negotiable';
                }
            })
            ->make(true);
    }

    public function indexPendingVerificationAds(BulkImportRepository $bulkImportRepository){

        $single_ads = $bulkImportRepository->indexBulkPendingAds();

        return Datatables::of($single_ads)
            ->addColumn('id', function ($single_ad){

                return $single_ad->id;
            })
            ->addColumn('car_make', function ($single_ad){

                return $single_ad->car_make->name;
            })
            ->addColumn('car_model', function ($single_ad){

                return $single_ad->car_model->name;
            })
            ->addColumn('year', function ($single_ad){

                return $single_ad->year;
            })
            ->addColumn('mileage', function ($single_ad){

                return $single_ad->mileage;
            })
            ->addColumn('body_type', function ($single_ad){

                return $single_ad->body_type->name;
            })
            ->addColumn('transmission_type', function ($single_ad){

                return $single_ad->transmission_type->name;
            })
            ->addColumn('car_condition', function ($single_ad){

                return $single_ad->car_condition->name;
            })
            ->addColumn('duty', function ($single_ad){

                return $single_ad->duty->name;
            })
            ->addColumn('price', function ($single_ad){

                return $single_ad->price;
            })
            ->addColumn('negotiable', function ($single_ad){

                if($single_ad->negotiable_price == 'allowed'){
                    return 'Negotiable';
                }else{
                    return 'Not Negotiable';
                }
            })
            ->make(true);
    }

    public function indexDeclinedAds(VehicleVerificationsRepository $vehicleVerificationsRepository){

        $declined_ads = $vehicleVerificationsRepository->indexDeclinedAds();

        return Datatables::of($declined_ads)
            ->addColumn('id', function ($declined_ads){

                return $declined_ads->vehicle_detail->id;
            })
            ->addColumn('car_make', function ($declined_ads){

                return $declined_ads->vehicle_detail->car_make->name;
            })
            ->addColumn('car_model', function ($declined_ads){

                return $declined_ads->vehicle_detail->car_model->name;
            })
            ->addColumn('year', function ($declined_ads){

                return $declined_ads->vehicle_detail->year;
            })
            ->addColumn('mileage', function ($declined_ads){

                return $declined_ads->vehicle_detail->mileage;
            })
            ->addColumn('body_type', function ($declined_ads){

                return $declined_ads->vehicle_detail->body_type->name;
            })
            ->addColumn('transmission_type', function ($declined_ads){

                return $declined_ads->vehicle_detail->transmission_type->name;
            })
            ->addColumn('car_condition', function ($declined_ads){

                return $declined_ads->vehicle_detail->car_condition->name;
            })
            ->addColumn('duty', function ($declined_ads){

                return $declined_ads->vehicle_detail->duty->name;
            })
            ->addColumn('price', function ($declined_ads){

                return $declined_ads->vehicle_detail->price;
            })
            ->addColumn('negotiable', function ($declined_ads){

                if($declined_ads->vehicle_detail->negotiable_price == 'allowed'){
                    return 'Negotiable';
                }else{
                    return 'Not Negotiable';
                }
            })
            ->make(true);

    }

    public function indexExpiredAds(AdStatusRepository $adStatusRepository){

        $expired_ads = $adStatusRepository->indexExpiredAds();

        return Datatables::of($expired_ads)
            ->addColumn('id', function ($expired_ad){

                return $expired_ad->vehicle_detail->id;
            })
            ->addColumn('car_make', function ($expired_ad){

                return $expired_ad->vehicle_detail->car_make->name;
            })
            ->addColumn('car_model', function ($expired_ad){

                return $expired_ad->vehicle_detail->car_model->name;
            })
            ->addColumn('year', function ($expired_ad){

                return $expired_ad->vehicle_detail->year;
            })
            ->addColumn('mileage', function ($expired_ad){

                return $expired_ad->vehicle_detail->mileage;
            })
            ->addColumn('body_type', function ($expired_ad){

                return $expired_ad->vehicle_detail->body_type->name;
            })
            ->addColumn('transmission_type', function ($expired_ad){

                return $expired_ad->vehicle_detail->transmission_type->name;
            })
            ->addColumn('car_condition', function ($expired_ad){

                return $expired_ad->vehicle_detail->car_condition->name;
            })
            ->addColumn('duty', function ($expired_ad){

                return $expired_ad->vehicle_detail->duty->name;
            })
            ->addColumn('price', function ($expired_ad){

                return $expired_ad->vehicle_detail->price;
            })
            ->addColumn('negotiable', function ($expired_ad){

                if($expired_ad->vehicle_detail->negotiable_price == 'allowed'){
                    return 'Negotiable';
                }else{
                    return 'Not Negotiable';
                }
            })
            ->make(true);
    }

    public function indexBulkUploadImportsData(BulkImportRepository $bulkImportRepository,
                                               $bulkImportId){

        $single_ads = $bulkImportRepository->indexFroBulkImport($bulkImportId);

        return Datatables::of($single_ads)
            ->addColumn('id', function ($single_ad){

                return $single_ad->unique_identifier;
            })
//            ->addColumn('id', function ($single_ad){
//
//                return $single_ad->id;
//            })
            ->addColumn('car_make', function ($single_ad){

                return $single_ad->car_make->name;
            })
            ->addColumn('car_model', function ($single_ad){

                return $single_ad->car_model->name;
            })
            ->addColumn('year', function ($single_ad){

                return $single_ad->year;
            })
            ->addColumn('mileage', function ($single_ad){

                return $single_ad->mileage;
            })
            ->addColumn('body_type', function ($single_ad){

                return $single_ad->body_type->name;
            })
            ->addColumn('transmission_type', function ($single_ad){

                return $single_ad->transmission_type->name;
            })
            ->addColumn('car_condition', function ($single_ad){

                return $single_ad->car_condition->name;
            })
            ->addColumn('duty', function ($single_ad){

                return $single_ad->duty->name;
            })
            ->addColumn('price', function ($single_ad){

                return $single_ad->price;
            })
            ->addColumn('negotiable', function ($single_ad){

                if($single_ad->negotiable_price == 'allowed'){
                    return 'Negotiable';
                }else{
                    return 'Not Negotiable';
                }
            })
            ->addColumn('images_uploaded', function ($single_ad){

                return 'Uploaded';
            })
            ->addColumn('verified', function ($single_ad){

                return 'Verified';
            })
            ->make(true);

    }
}
