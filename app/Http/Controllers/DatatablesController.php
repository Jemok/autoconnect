<?php

namespace App\Http\Controllers;

use App\Repositories\AdStatusRepository;
use App\Repositories\BulkImportRepository;
use App\Repositories\MpesaPaymentsRepository;
use App\Repositories\SingleAdsRepository;
use App\Repositories\VehicleImagesRepository;
use App\Repositories\VehicleVerificationsRepository;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class DatatablesController extends Controller
{
    public function indexOnlineAds(SingleAdsRepository $singleAdsRepository,
                                   AdStatusRepository $adStatusRepository){

//        $single_ads = $singleAdsRepository->index();

        $single_ads = $adStatusRepository->indexOnlineAds();

        return Datatables::of($single_ads)
            ->addColumn('id', function ($single_ad){

                return $single_ad->vehicle_detail->unique_identifier;
            })
            ->addColumn('manage_ad', function ($single_ad){

                if($single_ad->type == 'bulk') {

                    $url = route('adminManageBulkImages', [$single_ad->bulk_ad->bulk_import_id, $single_ad->bulk_ad->user_bulk_import_id]);

                    return '<a class="btn btn-success btn-sm" href="' . $url . '">Manage Ad</a>';
                }

                if($single_ad->type == 'single') {

                    $url = route('indexSingleAdsImages', $single_ad->vehicle_detail_id);

                    return '<a class="btn btn-success btn-sm" href="'.$url.'">Manage Ad</a>';
                }
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
            ->rawColumns(['manage_ad', 'ad_type'])
            ->make(true);
    }

    public function indexOnlineAdsDataForDealer(SingleAdsRepository $singleAdsRepository,
                                                AdStatusRepository $adStatusRepository){

//        $single_ads = $singleAdsRepository->index();

        $single_ads = $adStatusRepository->indexDealerOnlineAds(Auth::user()->id);

        return Datatables::of($single_ads)
            ->addColumn('id', function ($single_ad){

                return $single_ad->vehicle_detail->unique_identifier;
            })
            ->addColumn('manage_ad', function ($single_ad){

                $url = route('indexSingleAdsImages', $single_ad->vehicle_detail->id);

                return '<a class="btn btn-success btn-sm" href="'.$url.'">Manage Ad</a>';
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
            ->rawColumns(['manage_ad', 'ad_type'])
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

                if($single_ad->type == 'bulk'){

                    $url = route('adminManageBulkImages', [$single_ad->bulk_ad->bulk_import_id, $single_ad->bulk_ad->user_bulk_import_id]);

                    return '<a class="btn btn-success btn-sm" href="'.$url.'">Manage Ad</a>';

                }elseif ($single_ad->type == 'single'){

                    $url = route('indexSingleAdsImages', $single_ad->vehicle_detail_id);

                    return '<a class="btn btn-success btn-sm" href="'.$url.'">Manage Ad</a>';
                }
            })
            ->addColumn('verified', function ($single_ad){

                if($single_ad->type == 'bulk') {

                    if ($single_ad->bulk_ad->user_bulk_import->approval_status == 'not_approved') {

                        return '<i class="fa fa-times text-danger"></i>' . 'Not Approved';
                    } elseif ($single_ad->bulk_ad->user_bulk_import->approval_status == 'approved') {
                        return '<i class="fa fa-check text-success"></i>' . ' Approved';
                    }
                }else if ($single_ad->type == 'single'){

                    if ($single_ad->vehicle_detail->vehicle_verification->status == 'not_verified'){
                        return '<i class="fa fa-times text-danger"></i>' . 'Not Approved';
                    }elseif ($single_ad->vehicle_detail->vehicle_verification->status == 'verified'){
                        return '<i class="fa fa-check text-success"></i>' . ' Approved';
                    }
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
            ->addColumn('created_at', function ($single_ad){

                return $single_ad->created_at;
            })
            ->rawColumns(['manage_ad', 'verified', 'ad_type'])
            ->make(true);
    }

    public function indexPendingVerificationAdsForDealer(BulkImportRepository $bulkImportRepository,
                                                         AdStatusRepository $adStatusRepository){

//        $single_ads = $bulkImportRepository->indexBulkPendingAds();

        $single_ads = $adStatusRepository->indexPendingVerificationAdsForDealer(Auth::user()->id);

        return Datatables::of($single_ads)
            ->addColumn('id', function ($single_ad){

                return $single_ad->vehicle_detail->unique_identifier;
            })
            ->addColumn('manage_ad', function ($single_ad){

                if($single_ad->type == 'bulk'){

                    $url = route('adminManageBulkImages', [$single_ad->bulk_ad->bulk_import_id, $single_ad->bulk_ad->user_bulk_import_id]);

                    return '<a class="btn btn-success btn-sm" href="'.$url.'">Manage Ad</a>';

                }elseif ($single_ad->type == 'single'){

                    $url = route('indexSingleAdsImages', $single_ad->vehicle_detail_id);

                    return '<a class="btn btn-success btn-sm" href="'.$url.'">Manage Ad</a>';
                }
            })
            ->addColumn('verified', function ($single_ad){


                if($single_ad->type == 'bulk') {

                    if ($single_ad->bulk_ad->user_bulk_import->approval_status == 'not_approved') {

                        return '<i class="fa fa-times text-danger"></i>' . 'Not Approved';
                    } elseif ($single_ad->bulk_ad->user_bulk_import->approval_status == 'approved') {
                        return '<i class="fa fa-check text-success"></i>' . ' Approved';
                    }
                }else if ($single_ad->type == 'single'){

                    if ($single_ad->vehicle_detail->vehicle_verification->status == 'not_verified'){
                        return '<i class="fa fa-times text-danger"></i>' . 'Not Approved';
                    }elseif ($single_ad->vehicle_detail->vehicle_verification->status == 'verified'){
                        return '<i class="fa fa-check text-success"></i>' . ' Approved';
                    }
                }


                return 'Approved';
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
            ->addColumn('created_at', function ($single_ad){

                return $single_ad->created_at;
            })
            ->rawColumns(['manage_ad', 'verified', 'ad_type'])
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


                if($disapproval_reason->type == 'bulk'){


                    $url = route('adminManageBulkImages', [$disapproval_reason->user_bulk_import->bulk_import_id, $disapproval_reason->user_bulk_import->id]);

                    return '<a href="'.$url.'" class="btn btn-primary btn-sm"><i class="fa fa-images"></i>View</a>';
                }

                if($disapproval_reason->type == 'single'){


                    $url = route('indexSingleAdsImages', $disapproval_reason->user_bulk_import->id);

                    return '<a href="'.$url.'" class="btn btn-primary btn-sm"><i class="fa fa-images"></i>View</a>';
                }

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

                if($disapproval_reason->type == 'bulk'){

                    $url = route('adminManageBulkImages', [$disapproval_reason->user_bulk_import->bulk_import_id, $disapproval_reason->user_bulk_import->id]);

                    return '<a href="'.$url.'" class="btn btn-primary btn-sm"><i class="fa fa-images"></i>View</a>';
                }

                if($disapproval_reason->type == 'single'){


                    $url = route('indexSingleAdsImages', $disapproval_reason->user_bulk_import->id);

                    return '<a href="'.$url.'" class="btn btn-primary btn-sm"><i class="fa fa-images"></i>View</a>';
                }
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

                if($single_ad->type == 'bulk') {

                    $url = route('adminManageBulkImages', [$single_ad->bulk_ad->bulk_import_id, $single_ad->bulk_ad->user_bulk_import_id]);

                    return '<a class="btn btn-success btn-sm" href="' . $url . '">Manage Ad</a>';
                }

                if($single_ad->type == 'single') {

                    $url = route('indexSingleAdsImages', $single_ad->vehicle_detail_id);

                    return '<a class="btn btn-success btn-sm" href="'.$url.'">Manage Ad</a>';
                }

//                $url = route('indexSingleAdsImages', $single_ad->id);
//
//                return '<a class="btn btn-success btn-sm" href="'.$url.'">Manage Ad</a>';
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
            ->editColumn('edit', function ($single_ad) use ($bulkImportId) {

                $url = route('editUserBulkImportVehicle', [$single_ad->id, $bulkImportId]);

                return '<a href="'.$url.'" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i>Edit</a>';
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
            })->addColumn('created_at', function ($single_ad){

                return $single_ad->created_at;
            })
            ->rawColumns(['images_uploaded', 'upload_images', 'verified', 'edit'])
            ->make(true);
    }


    public function indexBulkAdsDataForAdmin(BulkImportRepository $bulkImportRepository){

        $bulk_imports = $bulkImportRepository->indexForPayments();

        return Datatables::of($bulk_imports)

            ->addColumn('id', function ($bulk_import){

                return $bulk_import->bulk_import->id;
            })
            ->addColumn('unique_identifier', function ($bulk_import){

                return $bulk_import->bulk_import->unique_identifier;
            })
            ->addColumn('name', function ($bulk_import){

                return $bulk_import->bulk_import->user->name;
            })
            ->addColumn('email', function ($bulk_import){

                return $bulk_import->bulk_import->user->email;
            }) ->addColumn('created_at', function ($bulk_import){

                return $bulk_import->created_at;
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
            ->addColumn('payment_method', function ($bulk_import){

                if(isset($bulk_import->bulk_import->bulk_import_approval->payment_method)){
                    if($bulk_import->bulk_import->bulk_import_approval->payment_method == 'cash'){
                        return 'Cash';
                    }elseif($bulk_import->bulk_import->bulk_import_approval->payment_method == 'mpesa'){
                        return 'Mpesa';
                    }elseif($bulk_import->bulk_import->bulk_import_approval->payment_method == 'cheque'){
                        return 'Cheque';
                    }else{
                        return 'Mpesa';
                    }
                }else{
                    return 'Mpesa';
                }
            })
            ->addColumn('payment_commitment', function ($bulk_import){

                if(isset($bulk_import->bulk_import->bulk_import_approval->payment_commitment)){
                    if($bulk_import->bulk_import->bulk_import_approval->payment_commitment == 'partial'){
                        return 'Partial';
                    }elseif($bulk_import->bulk_import->bulk_import_approval->payment_commitment == 'full'){
                        return 'Full';
                    }else{
                        return 'Full';
                    }
                }else{
                    return 'Full';
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

    public function getAllMpesaPayments(MpesaPaymentsRepository  $mpesaPaymentsRepository){

        $mpesa_payments = $mpesaPaymentsRepository->index();

        return Datatables::of($mpesa_payments)

            ->addColumn('id', function ($mpesa_payment){

                return $mpesa_payment->id;
            })
            ->addColumn('transaction_type', function ($mpesa_payment){

                return $mpesa_payment->transaction_type;
            })
            ->addColumn('trans_id', function ($mpesa_payment){

                return $mpesa_payment->trans_id;
            })
            ->addColumn('trans_amount', function ($mpesa_payment){

                return $mpesa_payment->trans_amount;

            }) ->addColumn('business_short_code', function ($mpesa_payment){

                return $mpesa_payment->business_short_code;
            })
            ->addColumn('bill_ref_number', function ($mpesa_payment){

                return $mpesa_payment->bill_ref_number;
            })
            ->addColumn('invoice_number', function ($mpesa_payment){

                return $mpesa_payment->invoice_number;
            })
            ->addColumn('org_account_number', function ($mpesa_payment){

                return $mpesa_payment->org_account_number;
            })
            ->addColumn('internal_transaction_id', function ($mpesa_payment){

                return $mpesa_payment->org_account_number;
            })
            ->addColumn('msisdn', function ($mpesa_payment){

                return $mpesa_payment->msisdn;
            })
            ->addColumn('first_name', function ($mpesa_payment){

                return $mpesa_payment->first_name;
            })
            ->addColumn('middle_name', function ($mpesa_payment){

                return $mpesa_payment->middle_name;
            })
            ->addColumn('last_name', function ($mpesa_payment){

                return $mpesa_payment->last_name;
            })
            ->addColumn('created_at', function ($mpesa_payment){

                return $mpesa_payment->created_at;
            })
            ->addColumn('updated_at', function ($mpesa_payment){

                return $mpesa_payment->created_at;
            })
            ->make(true);
    }


    public function indexBulkAdsDataForDealer(BulkImportRepository $bulkImportRepository){

        $bulk_imports = $bulkImportRepository->indexForUser(Auth::user()->id);

        return Datatables::of($bulk_imports)

            ->addColumn('id', function ($bulk_import){

                return $bulk_import->unique_identifier;
            })
            ->addColumn('created_at', function ($bulk_import){

                return $bulk_import->created_at->diffForHumans();
            })
            ->addColumn('created_at_not_human', function ($bulk_import){

                return $bulk_import->created_at;
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
