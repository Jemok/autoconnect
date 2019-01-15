<?php

namespace App\Http\Controllers;

use App\Repositories\AdStatusRepository;
use App\Repositories\BulkImportRepository;
use App\Repositories\SingleAdsRepository;
use App\Repositories\VehicleImagesRepository;
use App\Repositories\VehicleVerificationsRepository;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class DatatablesController extends Controller
{
    public function indexOnlineAds(SingleAdsRepository $singleAdsRepository){

        $single_ads = $singleAdsRepository->index();

        return Datatables::of($single_ads)
            ->addColumn('id', function ($single_ad){

                return $single_ad->id;
            })
            ->addColumn('manage_ad', function ($single_ad){

                $url = route('indexSingleAdsImages', $single_ad->id);

                return '<a class="btn btn-success btn-sm" href="'.$url.'">Manage Ad</a>';
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
            ->rawColumns(['manage_ad'])
            ->make(true);
    }

    public function indexOnlineAdsDataForDealer(SingleAdsRepository $singleAdsRepository){

        $single_ads = $singleAdsRepository->index();

        return Datatables::of($single_ads)
            ->addColumn('id', function ($single_ad){

                return $single_ad->id;
            })
            ->addColumn('manage_ad', function ($single_ad){

                $url = route('indexSingleAdsImages', $single_ad->id);

                return '<a class="btn btn-success btn-sm" href="'.$url.'">Manage Ad</a>';
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
            ->rawColumns(['manage_ad'])
            ->make(true);
    }

    public function indexPendingVerificationAds(BulkImportRepository $bulkImportRepository,
                                                AdStatusRepository $adStatusRepository){

//        $single_ads = $bulkImportRepository->indexBulkPendingAds();

        $single_ads = $adStatusRepository->indexPendingVerificationAds();

        return Datatables::of($single_ads)
            ->addColumn('id', function ($single_ad){

                return $single_ad->vehicle_detail->unique_identifier;
            })
            ->addColumn('manage_ad', function ($single_ad){

                $url = route('adminManageBulkImages', [$single_ad->bulk_ad->bulk_import_id, $single_ad->bulk_ad->user_bulk_import_id]);

                return '<a class="btn btn-success btn-sm" href="'.$url.'">Manage Ad</a>';

            })
            ->addColumn('verified', function ($single_ad){

                if($single_ad->bulk_ad->user_bulk_import->approval_status == 'not_approved'){

                    return '<i class="fa fa-times text-danger"></i>'.'Not Approved';
                }elseif($single_ad->bulk_ad->user_bulk_import->approval_status == 'approved'){
                    return '<i class="fa fa-check text-success"></i>'.' Approved';
                }

                return 'Approved';
            })
            ->addColumn('ad_type', function ($single_ad){

                if($single_ad->type == 'bulk'){

                    $url = route('confirmBulkImports', $single_ad->bulk_ad->bulk_import_id);

                    return '<a class="" href="'.$url.'">Bulk</a>';
                }elseif ($single_ad->type == 'single'){

                    return 'Single';
                }
            })
            ->addColumn('car_make', function ($single_ad){

                return $single_ad->vehicle_detail->car_make->name;
            })
            ->addColumn('car_model', function ($single_ad){

                return $single_ad->vehicle_detail->car_model->name;
            })
            ->addColumn('year', function ($single_ad){

                return $single_ad->vehicle_detail->year;
            })
            ->addColumn('mileage', function ($single_ad){

                return $single_ad->vehicle_detail->mileage;
            })
            ->addColumn('body_type', function ($single_ad){

                return $single_ad->vehicle_detail->body_type->name;
            })
            ->addColumn('transmission_type', function ($single_ad){

                return $single_ad->vehicle_detail->transmission_type->name;
            })
            ->addColumn('car_condition', function ($single_ad){

                return $single_ad->vehicle_detail->car_condition->name;
            })
            ->addColumn('duty', function ($single_ad){

                return $single_ad->vehicle_detail->duty->name;
            })
            ->addColumn('price', function ($single_ad){

                return $single_ad->vehicle_detail->price;
            })
            ->addColumn('negotiable', function ($single_ad){

                if($single_ad->vehicle_detail->negotiable_price == 'allowed'){
                    return 'Negotiable';
                }else{
                    return 'Not Negotiable';
                }
            })
            ->rawColumns(['manage_ad', 'verified', 'ad_type'])
            ->make(true);
    }

    public function indexPendingVerificationAdsForDealer(BulkImportRepository $bulkImportRepository){

        $single_ads = $bulkImportRepository->indexBulkPendingAds();

        return Datatables::of($single_ads)
            ->addColumn('id', function ($single_ad){

                return $single_ad->unique_identifier;
            })
            ->addColumn('manage_ad', function ($single_ad){

                $url = route('adminManageBulkImages', [$single_ad->bulk_import_id, $single_ad->id]);

                return '<a class="btn btn-success btn-sm" href="'.$url.'">Manage Ad</a>';
            })
            ->addColumn('verified', function ($single_ad){

                if($single_ad->approval_status == 'not_approved'){

                    return '<i class="fa fa-times text-danger"></i>'.'Not Verified';
                }elseif($single_ad->approval_status == 'approved'){
                    return '<i class="fa fa-check text-success"></i>'.' Verified';
                }

                return 'Verified';
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
            ->rawColumns(['manage_ad', 'verified'])
            ->make(true);
    }

    public function indexDeclinedAds(BulkImportRepository $bulkImportRepository){

        $disapproval_reasons = $bulkImportRepository->getAllSubmittedCorrections();


        return Datatables::of($disapproval_reasons)
            ->addColumn('id', function ($disapproval_reason){

                return $disapproval_reason->id;
            })
            ->addColumn('reason', function ($disapproval_reason){

                return $disapproval_reason->reason;
            })
            ->addColumn('status', function ($disapproval_reason){

                if($disapproval_reason->status == 'resolved'){

                    return 'Resolved';
                }

                if($disapproval_reason->status == 'not_resolved'){

                    return 'Not Resolved';
                }
            })
            ->addColumn('view', function ($disapproval_reason){

                $url = route('adminManageBulkImages', [$disapproval_reason->user_bulk_import->bulk_import_id, $disapproval_reason->user_bulk_import->id]);

                return '<a href="'.$url.'" class="btn btn-primary btn-sm"><i class="fa fa-images"></i>View</a>';
            })
            ->rawColumns(['view'])
            ->make(true);
    }

    public function indexDeclinedAdsDataForDealer(BulkImportRepository $bulkImportRepository){

        $disapproval_reasons = $bulkImportRepository->getAllSubmittedCorrections();


        return Datatables::of($disapproval_reasons)
            ->addColumn('id', function ($disapproval_reason){

                return $disapproval_reason->id;
            })
            ->addColumn('reason', function ($disapproval_reason){

                return $disapproval_reason->reason;
            })
            ->addColumn('status', function ($disapproval_reason){

                if($disapproval_reason->status == 'resolved'){

                    return 'Resolved';
                }

                if($disapproval_reason->status == 'not_resolved'){

                    return 'Not Resolved';
                }
            })
            ->addColumn('view', function ($disapproval_reason){

                $url = route('adminManageBulkImages', [$disapproval_reason->user_bulk_import->bulk_import_id, $disapproval_reason->user_bulk_import->id]);

                return '<a href="'.$url.'" class="btn btn-primary btn-sm"><i class="fa fa-images"></i>View</a>';
            })
            ->rawColumns(['view'])
            ->make(true);
    }

    public function indexExpiredAds(AdStatusRepository $adStatusRepository){

        $expired_ads = $adStatusRepository->indexExpiredAds();

        return Datatables::of($expired_ads)
            ->addColumn('id', function ($expired_ad){

                return $expired_ad->vehicle_detail->id;
            })
            ->addColumn('manage_ad', function ($single_ad){

                $url = route('indexSingleAdsImages', $single_ad->id);

                return '<a class="btn btn-success btn-sm" href="'.$url.'">Manage Ad</a>';
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
            ->rawColumns(['manage_ad'])
            ->make(true);
    }

    public function indexExpiredAdsDataForDealer(AdStatusRepository $adStatusRepository){

        $expired_ads = $adStatusRepository->indexExpiredAds();

        return Datatables::of($expired_ads)
            ->addColumn('id', function ($expired_ad){

                return $expired_ad->vehicle_detail->id;
            })
            ->addColumn('manage_ad', function ($single_ad){

                $url = route('indexSingleAdsImages', $single_ad->id);

                return '<a class="btn btn-success btn-sm" href="'.$url.'">Manage Ad</a>';
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
            ->rawColumns(['manage_ad'])
            ->make(true);
    }

    public function indexBulkUploadImportsData(BulkImportRepository $bulkImportRepository,
                                               VehicleImagesRepository $vehicleImagesRepository,
                                               $bulkImportId){

        $single_ads = $bulkImportRepository->indexFroBulkImport($bulkImportId);

        return Datatables::of($single_ads)
            ->addColumn('id', function ($single_ad) use ($vehicleImagesRepository){

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
            ->addColumn('images_uploaded', function ($single_ad)use ($vehicleImagesRepository){

                if($vehicleImagesRepository->checkIfImagesExistForBulk($single_ad->id)){

                    return '<i class="fa fa-check text-success"></i>'. ' Uploaded';

                }else{
                    return '<i class="fa fa-times text-danger"></i>'. ' Not Uploaded';
                }
            })
            ->editColumn('upload_images', function ($single_ad) use ($bulkImportId) {

                $url = route('createBulkImages', [$bulkImportId, $single_ad->id]);

                return '<a href="'.$url.'" class="btn btn-primary btn-sm"><i class="fa fa-images"></i>Upload Images</a>';
            })
            ->addColumn('verified', function ($single_ad){

                if($single_ad->approval_status == 'not_approved'){

                    return '<i class="fa fa-times text-danger"></i>'.'Not Verified';
                }elseif($single_ad->approval_status == 'approved'){
                    return '<i class="fa fa-check text-success"></i>'.' Verified';
                }

                return 'Verified';
            })
            ->rawColumns(['images_uploaded', 'upload_images', 'verified'])
            ->make(true);
    }


    public function indexBulkAdsDataForAdmin(BulkImportRepository $bulkImportRepository){

        $bulk_imports = $bulkImportRepository->indexForPayments();

        return Datatables::of($bulk_imports)

            ->addColumn('id', function ($bulk_import){

                return $bulk_import->bulk_import->id;
            })
            ->addColumn('name', function ($bulk_import){

                return $bulk_import->bulk_import->user->name;
            })
            ->addColumn('email', function ($bulk_import){

                return $bulk_import->bulk_import->user->email;
            })
            ->addColumn('payment_status', function ($bulk_import){

                if(isset($bulk_import->bulk_import_approval->payment_status)){
                    if($bulk_import->bulk_import_approval->payment_status == 'paid'){
                        return 'Paid';
                    }else{
                        return 'Not Paid';
                    }
                }else{
                    return 'Not Paid';
                }
            })
            ->addColumn('approval_status', function ($bulk_import){
                if(isset($bulk_import->bulk_import_approval->approval_status)){
                    if($bulk_import->bulk_import_approval->approval_status == 'approved'){
                        return 'Approved';
                    }else{
                        return 'Not Approved';
                    }
                }else{
                    return 'Not Approved';
                }
            })
            ->addColumn('view', function ($bulk_import){

                $url = route('indexForAdmin', $bulk_import->bulk_import_id);

                return '<a href="'.$url.'" class="btn btn-primary btn-sm"><i class="fa fa-images"></i>View</a>';
            })
            ->rawColumns(['view'])
            ->make(true);
    }

    public function indexBulkAdsDataForDealer(BulkImportRepository $bulkImportRepository){

        $bulk_imports = $bulkImportRepository->indexForUser(Auth::user()->id);

        return Datatables::of($bulk_imports)

            ->addColumn('id', function ($bulk_import){

                return $bulk_import->id;
            })
            ->addColumn('created_at', function ($bulk_import){

                return $bulk_import->created_at->diffForHumans();
            })
            ->addColumn('approval_status', function ($bulk_import){

//                if($bulk_import->bulk_import_approval->approval_status == 'approved'){
//
//                    return 'Approved';
//                }elseif ($bulk_import->bulk_import_approval->approval_status == 'not_approved'){
//
//                    return 'Not Approved';
//                }

                return 'Not Approved';

            })
            ->addColumn('view', function ($bulk_import){

                $url = route('confirmBulkImports', $bulk_import->id);

                return '<a href="'.$url.'" class="btn btn-primary btn-sm"><i class="fa fa-images"></i>View</a>';

            })
            ->rawColumns(['view'])
            ->make(true);
    }
}
