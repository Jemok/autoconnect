<?php

namespace App\Http\Controllers;

use App\Exports\VehicleDetailExport;
use App\Http\Requests\BulkApprovalRequest;
use App\Http\Requests\BulkUpladFileRequest;
use App\Http\Requests\CarDetailsRequest;
use App\Http\Requests\SetBulkVehicleAsNotApprovedRequest;
use App\Imports\VehicleDetailsImport;
use App\Notifications\AdDisapprovedNotification;
use App\Notifications\BulkPaymentNotification;
use App\Repositories\AdStatusRepository;
use App\Repositories\AreasRepository;
use App\Repositories\BodyTypeRepository;
use App\Repositories\BulkAdsRepository;
use App\Repositories\BulkImportApprovalRepository;
use App\Repositories\BulkImportRepository;
use App\Repositories\BulkPaymentsRepository;
use App\Repositories\CarConditionRepository;
use App\Repositories\CarMakeRepository;
use App\Repositories\CarModelRepository;
use App\Repositories\ColourTypeRepository;
use App\Repositories\DealerProfileRepository;
use App\Repositories\DriveSetUpRepository;
use App\Repositories\DriveTypeRepository;
use App\Repositories\DutyRepository;
use App\Repositories\FuelTypeRepository;
use App\Repositories\InteriorRepository;
use App\Repositories\RolesRepository;
use App\Repositories\SingleAdsRepository;
use App\Repositories\TransmissionTypeRepository;
use App\Repositories\UsersRepository;
use App\Repositories\VehicleDetailRepository;
use App\Repositories\VehicleFeaturesRepository;
use App\Repositories\VehicleImagesRepository;
use App\VehicleDetail;
use Carbon\Carbon;
use DemeterChain\B;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class BulkUploadController extends Controller
{

    /**
     * AccountController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function startBulkUpload(RolesRepository $rolesRepository, DealerProfileRepository $dealerProfileRepository){

//        return view('bulk-uploads.start-uploading');

        $check_if_profile_exists  = $dealerProfileRepository->checkIfUserProfileExists(Auth::user()->id);


        if (Auth::user()->hasRole('dealer')){


            return view('bulk-uploads.dealer.start', compact('check_if_profile_exists'));

        }

        $dealer_role = $rolesRepository->showFromName('dealer');

        $dealer_roles = $rolesRepository->showAllUsersForRole($dealer_role->id);

        return view('bulk-uploads.admin.start', compact('dealer_roles'));
    }


    public function downloadExcelTemplate(){


        return Excel::download(new VehicleDetailExport(), 'uniautoconnect.xlsx');

    }

    public function saveBulkUpload(RolesRepository $rolesRepository){

//        return view('bulk-uploads.save');

        $dealer_role = $rolesRepository->showFromName('dealer');

        $dealer_roles = $rolesRepository->showAllUsersForRole($dealer_role->id);

        return view('bulk-uploads.admin.save', compact('dealer_roles'));

    }

    public function importVehicles(BulkUpladFileRequest $request,
                                   BulkImportRepository $bulkImportRepository,
                                   UsersRepository $usersRepository){


        if(Auth::user()->hasRole('super-admin')){

            $validator = Validator::make(
                [
                    'vehicle_file'      => $request->vehicle_file,
                    'extension' => strtolower($request->vehicle_file->getClientOriginalExtension()),
                    'user'           => 'required'
                ],
                [
                    'vehicle_file'          => 'required',
                    'extension'      => 'required|in:xlsx,xls',
                    'user'           => 'required'
                ]
            );

        }else{

            $validator = Validator::make(
                [
                    'vehicle_file'      => $request->vehicle_file,
                    'extension' => strtolower($request->vehicle_file->getClientOriginalExtension()),
                ],
                [
                    'vehicle_file'          => 'required',
                    'extension'      => 'required|in:xlsx,xls',
                ]
            );
        }

        $validator->validate();

        if(Auth::user()->hasRole('super-admin')){

            $user = $usersRepository->showUsingId($request->user);

            $bulk_import = $bulkImportRepository->store($user);

        }else{

            $bulk_import = $bulkImportRepository->store(Auth::user());
        }

        $bulkImportRepository->storeBulkImportStatus($bulk_import, 'uploading');

        if($request->hasFile('vehicle_file')){

            if(Auth::user()->hasRole('super-admin')){
                Excel::import(new VehicleDetailsImport($bulk_import->id, $request->user), request()->file('vehicle_file'));

            }else{
                Excel::import(new VehicleDetailsImport($bulk_import->id, Auth::user()->id), request()->file('vehicle_file'));
            }

        }

        return redirect()->route('confirmBulkImports', $bulk_import->id);
    }

    public function confirmBulkImports($bulkImportId,
                                       BulkImportRepository $bulkImportRepository,
                                       VehicleImagesRepository $vehicleImagesRepository,
                                       CarMakeRepository $carMakeRepository,
                                       CarModelRepository $carModelRepository,
                                       BodyTypeRepository $bodyTypeRepository,
                                       TransmissionTypeRepository $transmissionTypeRepository,
                                       CarConditionRepository $carConditionRepository,
                                       DutyRepository $dutyRepository,
                                       FuelTypeRepository $fuelTypeRepository,
                                       InteriorRepository $interiorRepository,
                                       ColourTypeRepository  $colourTypeRepository,
                                       VehicleFeaturesRepository $vehicleFeaturesRepository,
                                       DriveSetUpRepository $driveSetUpRepository,
                                       DriveTypeRepository $driveTypeRepository,
                                       AreasRepository $areasRepository){

        $single_ads = $bulkImportRepository->indexFroBulkImport($bulkImportId);

        $bulk_import = $bulkImportRepository->showBulkImport($bulkImportId);

        $car_makes = $carMakeRepository->index();

        $car_makes_for_search = $carMakeRepository->indexAll();

        $car_models = $carModelRepository->index();

        $body_types = $bodyTypeRepository->index();

        $transmission_types = $transmissionTypeRepository->index();

        $car_conditions = $carConditionRepository->index();

        $duties = $dutyRepository->index();

        $fuel_types = $fuelTypeRepository->index();

        $interiors = $interiorRepository->index();

        $colour_types = $colourTypeRepository->index();

        $vehicle_features = $vehicleFeaturesRepository->index();

        $areas = $areasRepository->index();

        $drive_setups = $driveSetUpRepository->index();

        $drive_types = $driveTypeRepository->index();

        $start_year = 1900;
        $next_year = Carbon::now()->year + 1;

        $door_counts = [
            [
                'slug' => 1,
                'description' => 1
            ],
            [
                'slug' => 2,
                'description' => 2
            ],
            [
                'slug' => 3,
                'description' => 3
            ],
            [
                'slug' => 4,
                'description' => 4
            ],
            [
                'slug' => 5,
                'description' => 5
            ],
            [
                'slug' => 6,
                'description' => 6
            ],
            [
                'slug' => 7,
                'description' => 7
            ],
            [
                'slug' => 8,
                'description' => 8
            ],
            [
                'slug' => 9,
                'description' => 9
            ],
            [
                'slug' => 10,
                'description' => 10
            ]
        ];


//        return view('bulk-uploads.confirm-imports', compact('bulkImportId',
//            'single_ads',
//            'vehicleImagesRepository'));

        return view('bulk-uploads.admin.confirmation-and-payment', compact('bulkImportId',
            'car_makes',
            'car_models',
            'next_year',
            'start_year',
            'body_types',
            'transmission_types',
            'car_conditions',
            'duties',
            'fuel_types',
            'interiors',
            'colour_types',
            'vehicle_features',
            'bulk_import',
            'drive_setups',
            'drive_types',
            'car_makes_for_search',
        'areas',
        'door_counts'));
    }

    public function createBulkImages(
        $bulkImportId,
        $singleBulkUploadId,
        BulkImportRepository $bulkImportRepository){

        $vehicleId = $singleBulkUploadId;

        $single_bulk_upload = $bulkImportRepository->showSingleBulkImport($singleBulkUploadId, $bulkImportId);

        $disapproval_reasons = $bulkImportRepository->getDisapprovalReasonsNotResolved($singleBulkUploadId);

        return view('bulk-uploads.bulk-pictures', compact('vehicleId', 'single_bulk_upload', 'disapproval_reasons'));
    }

    public function indexForPayments(BulkImportRepository $bulkImportRepository){

        $bulk_imports = $bulkImportRepository->indexForPayments();

        return view('bulk-uploads.index-for-payment', compact('bulk_imports'));
    }

    public function indexBulkImportsForAdmin($bulkImportId,
                                             BulkImportRepository $bulkImportRepository,
                                             VehicleImagesRepository $vehicleImagesRepository,
                                             BulkImportApprovalRepository $bulkImportApprovalRepository){

        $single_ads = $bulkImportRepository->indexFroBulkImport($bulkImportId);

        $bulk_payment_status = $bulkImportApprovalRepository->checkBulkPaymentStatus($bulkImportId);

        $bulk_approval_status = $bulkImportApprovalRepository->checkBulkApprovalStatus($bulkImportId);

        return view('bulk-uploads.index-for-admin', compact('bulkImportId',
            'single_ads',
            'vehicleImagesRepository',
            'bulk_payment_status',
            'bulk_approval_status'));
    }

    public function indexBulkUploadsForUser(BulkImportRepository $bulkImportRepository){

        $bulk_imports = $bulkImportRepository->indexForUser(Auth::user()->id);

        return view('bulk-uploads.index-for-user', compact('bulk_imports'));
    }


    public function adminManageBulkImages($bulkImportId,
                                          $singleBulkUploadId,
                                          BulkImportRepository $bulkImportRepository,
                                          VehicleImagesRepository $vehicleImagesRepository,
                                          BulkAdsRepository $bulkAdsRepository){

        $vehicle_detail = $bulkImportRepository->showSingleBulkImport($singleBulkUploadId, $bulkImportId);

        $vehicle_images = $vehicleImagesRepository->indexForBulUploadVehicle($singleBulkUploadId);

        $other_features = json_decode($vehicle_detail->other_features, true);

        $vehicleId = $singleBulkUploadId;

        $bulk_ad = $bulkAdsRepository->showForBulk($vehicle_detail->id);

        if($bulk_ad != false){
            $vehicle_detail_id = $bulk_ad->vehicle_detail_id;
        }else{
            $vehicle_detail_id = false;
        }

        $single_bulk_upload = $bulkImportRepository->showSingleBulkImport($singleBulkUploadId, $bulkImportId);

        $disapproval_reasons = $bulkImportRepository->getDisapprovalReasonsNotResolvedOrCorrected($singleBulkUploadId);
//
//        return view('bulk-uploads.admin-bulk-images', compact('vehicleId',
//            'single_bulk_upload',
//            'disapproval_reasons',
//            'vehicle_detail',
//            'vehicle_images',
//            'other_features'));

        return view('bulk-uploads.admin.manage-pending',
            compact('vehicleId',
                'single_bulk_upload',
                'disapproval_reasons',
                'vehicle_detail',
                'vehicle_images',
                'other_features',
                'vehicle_detail_id')
        );
    }

    public function setBulkVehicleAsApproved($userBulkImportId,
                                             $status,
                                             BulkImportRepository $bulkImportRepository,
                                             AdStatusRepository $adStatusRepository,
                                             BulkAdsRepository $bulkAdsRepository,
                                             VehicleDetailRepository $vehicleDetailRepository){

        $user_bulk_import = $bulkImportRepository->show($userBulkImportId);

        $bulkImportRepository->updateApprovalStatus($user_bulk_import, $status);

        $bulk_ad = $bulkAdsRepository->showForBulk($userBulkImportId);

        if($bulk_ad == false){

            $bulkImportRepository->moveSingleBulkAdOnline($user_bulk_import);
        }

        $start = Carbon::now();

        $stop = Carbon::now()->addDays(30);

        $vehicleDetail = $vehicleDetailRepository->show($bulk_ad->vehicle_detail_id);

        $ad_status = $adStatusRepository->setAdAsOnline($bulk_ad->vehicle_detail_id, $start, $stop);

        $adStatusRepository->storeAdPeriod($vehicleDetail,
            $ad_status,
            'active',
            $start,
            $stop);

        $vehicleDetailRepository->activateVehicle($vehicleDetail->id);

        flash()->overlay('The vehicle Ad was verified successfully');

        return redirect()->back();
    }

    public function showBulkDisapprovalPage($userBulkImportId,
                                            BulkImportRepository $bulkImportRepository){

        $user_bulk_import = $bulkImportRepository->show($userBulkImportId);

        return view('bulk-uploads.set-as-not-approved', compact('userBulkImportId', 'user_bulk_import'));
    }

    public function setBulkVehicleAsNotApproved($userBulkImportId,
                                                $status,
                                                SetBulkVehicleAsNotApprovedRequest $setBulkVehicleAsNotApprovedRequest,
                                                BulkImportRepository $bulkImportRepository,
                                                AdStatusRepository $adStatusRepository){

        $user_bulk_import = $bulkImportRepository->show($userBulkImportId);

        $bulkImportRepository->updateApprovalStatus($user_bulk_import, $status);

        $bulkImportRepository->saveDisapprovalReason($user_bulk_import, $setBulkVehicleAsNotApprovedRequest->reason, 'not_resolved');

        $adStatusRepository->setAdAsDeclined($userBulkImportId);

        $user = $user_bulk_import->user;

        $user->notify(new AdDisapprovedNotification($user_bulk_import, $setBulkVehicleAsNotApprovedRequest->reason));

        flash()->overlay('The car Ad was rejected and the reason was sent to the user successfully', 'Effected');

        return redirect()->route('adminManageBulkImages', [$user_bulk_import->bulk_import_id, $user_bulk_import->id]);
    }

    public function submitBulkCorrection($userBulkImportId,
                                         $disapprovalReasonId,
                                         $status,
                                         BulkImportRepository $bulkImportRepository){

        $user_bulk_import = $bulkImportRepository->show($userBulkImportId);

        $bulkImportRepository->updateApprovalStatus($user_bulk_import, $status);

        $bulkImportRepository->updateDisapprovalReason($userBulkImportId, $disapprovalReasonId, 'correction_submitted');

        flash()->overlay('Your correction was submitted successfully, please wait as we review it');

        return redirect()->back();
    }

    public function fixBulkCorrection($userBulkImportId,
                                      $disapprovalReasonId,
                                      $status,
                                      BulkImportRepository $bulkImportRepository,
                                      AdStatusRepository $adStatusRepository){

        $user_bulk_import = $bulkImportRepository->show($userBulkImportId);

        $bulkImportRepository->updateApprovalStatus($user_bulk_import, $status);

        $bulkImportRepository->updateDisapprovalReason($userBulkImportId, $disapprovalReasonId, $status);

        $adStatusRepository->setAdAsPending($userBulkImportId);

        flash()->overlay('Your correction was set as resolved successfully', 'Resolved');

        return redirect()->back();
    }

    public function indexCorrectedSubmissions(BulkImportRepository $bulkImportRepository){

        $disapproval_reasons = $bulkImportRepository->getAllSubmittedCorrections();

        return view('bulk-uploads.index-corrected-submissions', compact('disapproval_reasons'));
    }

    public function setApprovalForBulk($bulkImportId,
                                       BulkImportRepository $bulkImportRepository){


        return view('bulk-uploads.approval-and-payment', compact('bulkImportId'));
    }

    public function storeBulkApproval($bulkImportId,
                                      BulkApprovalRequest $bulkApprovalRequest,
                                      BulkImportRepository $bulkImportRepository){

        $bulk_import = $bulkImportRepository->showBulkImport($bulkImportId);

        $bulk_import_approval = $bulkImportRepository->storeBulkApproval($bulkImportId, $bulkApprovalRequest->all());

        $user = $bulk_import->user;

        if($bulkApprovalRequest->payment_method == 'mpesa'){

            $user->notify(new BulkPaymentNotification($bulk_import, $bulk_import_approval));
        }

        flash()->overlay('The Payment instructions were sent successfully', 'Sent');

        return redirect()->back();
    }

    public function moveBulkAdsOnline($bulkImportId,
                                      BulkImportRepository $bulkImportRepository,
                                      BulkAdsRepository $bulkAdsRepository,
                                      BulkImportApprovalRepository $bulkImportApprovalRepository){

        $bulk_import = $bulkImportRepository->showBulkImport($bulkImportId);

        $bulkApproval = $bulkImportApprovalRepository->approveBulkImport($bulkImportId);

        $bulkImportRepository->moveAdsToLive($bulkApproval->bulk_import_id,
            new BulkAdsRepository());

        $bulkAdsRepository->moveAdsOnline($bulkImportId, $bulk_import);

        flash()->overlay('The ads have been updated to online status', 'Success');

        return redirect()->back();
    }

    public function showBulkInterface(UsersRepository $usersRepository,
                                      Request $request,
                                      BulkImportRepository $bulkImportRepository){

        if(Auth::user()->hasRole('super-admin')){

            $user = $usersRepository->showUsingId(Auth::user()->id);

            $bulk_import = $bulkImportRepository->store($user);

        }else{

            $bulk_import = $bulkImportRepository->store(Auth::user());
        }


        return redirect()->route('retrieveBulkUploads', $bulk_import->id);
    }

    public function showBulkInterfaceAdmin(UsersRepository $usersRepository,
                                           Request $request,
                                           BulkImportRepository $bulkImportRepository){

        if(Auth::user()->hasRole('super-admin')){

            $user = $usersRepository->showUsingId($request->user);

            $bulk_import = $bulkImportRepository->store($user);

        }else{

            $bulk_import = $bulkImportRepository->store(Auth::user());
        }


        return redirect()->route('retrieveBulkUploads', $bulk_import->id);
    }


    public function retrieveBulkUploads($bulkImportId,
                                        CarMakeRepository $carMakeRepository,
                                        CarModelRepository $carModelRepository,
                                        BodyTypeRepository $bodyTypeRepository,
                                        TransmissionTypeRepository $transmissionTypeRepository,
                                        CarConditionRepository $carConditionRepository,
                                        DutyRepository $dutyRepository,
                                        FuelTypeRepository $fuelTypeRepository,
                                        InteriorRepository $interiorRepository,
                                        ColourTypeRepository $colourTypeRepository,
                                        VehicleFeaturesRepository $vehicleFeaturesRepository,
                                        BulkImportRepository $bulkImportRepository,
                                        DriveSetUpRepository $driveSetUpRepository,
                                        DriveTypeRepository $driveTypeRepository,
                                        RolesRepository $rolesRepository,
                                        AreasRepository $areasRepository){

        $car_makes = $carMakeRepository->index();

        $car_makes_for_search = $carMakeRepository->indexAll();

        $car_models = $carModelRepository->index();

        $body_types = $bodyTypeRepository->index();

        $transmission_types = $transmissionTypeRepository->index();

        $car_conditions = $carConditionRepository->index();

        $duties = $dutyRepository->index();

        $fuel_types = $fuelTypeRepository->index();

        $interiors = $interiorRepository->index();

        $colour_types = $colourTypeRepository->index();

        $vehicle_features = $vehicleFeaturesRepository->index();

        $drive_setups = $driveSetUpRepository->index();

        $drive_types = $driveTypeRepository->index();

        $areas = $areasRepository->index();

        $start_year = 1900;
        $next_year = Carbon::now()->year + 1;

        $bulk_import = $bulkImportRepository->showBulkImport($bulkImportId);

        $door_counts = [
            [
                'slug' => 1,
                'description' => 1
            ],
            [
                'slug' => 2,
                'description' => 2
            ],
            [
                'slug' => 3,
                'description' => 3
            ],
            [
                'slug' => 4,
                'description' => 4
            ],
            [
                'slug' => 5,
                'description' => 5
            ],
            [
                'slug' => 6,
                'description' => 6
            ],
            [
                'slug' => 7,
                'description' => 7
            ],
            [
                'slug' => 8,
                'description' => 8
            ],
            [
                'slug' => 9,
                'description' => 9
            ],
            [
                'slug' => 10,
                'description' => 10
            ]
        ];


        return view('bulk-uploads.bulk-interface', compact(
            'bulk_import',
            'car_makes',
            'car_models',
            'next_year',
            'start_year',
            'body_types',
            'transmission_types',
            'car_conditions',
            'duties',
            'fuel_types',
            'interiors',
            'colour_types',
            'vehicle_features',
            'drive_setups',
            'drive_types',
            'areas',
            'door_counts',
            'car_makes_for_search'));

    }

    public function storeBulkVehicle(CarDetailsRequest $carDetailsRequest,
                                     $bulkImportId,
                                     BulkImportRepository $bulkImportRepository){

        $userId = Auth::user()->id;

        $bulk_import = $bulkImportRepository->showBulkImport($bulkImportId);

        $bulk_import->bulk_upload_status = null;

        $bulk_import->save();

        $bulkImportRepository->storeBulkImports($carDetailsRequest->all(),
            $bulkImportId,
            $userId,
            new CarMakeRepository(),
            new CarModelRepository(),
            new BodyTypeRepository(),
            new TransmissionTypeRepository(),
            new CarConditionRepository(),
            new DutyRepository(),
            new ColourTypeRepository());

        flash()->overlay('Car Was Added Successfully', 'Continue to add another car');

        return redirect()->back();
    }

    public function indexBulkPayments($bulkImportId,
                                      BulkImportRepository $bulkImportRepository,
                                      BulkPaymentsRepository $bulkPaymentsRepository){

        $bulk_approval = $bulkImportRepository->showApproval($bulkImportId);

        $bulk_mpesa_payments = $bulkPaymentsRepository->indexMpesaForBulk($bulkImportId);

        $other_payments = $bulkPaymentsRepository->indexOtherForBulk($bulkImportId);

        return view('bulk-uploads.index-payments', compact('bulk_approval', 'bulk_mpesa_payments', 'bulkImportId', 'other_payments'));
    }

    public function recordBulkPayment($bulkImportId){

        return view('bulk-uploads.record-bulk-payment', compact('bulkImportId'));
    }

    public function storeOtherBulkPayment($bulkImportId,
                                          Request $request,
                                          BulkPaymentsRepository $bulkPaymentsRepository){

        $bulkPaymentsRepository->storeOtherBulkPayment($bulkImportId, $request->all());

        flash()->overlay('Payment Recorded Successfully');

        return redirect()->back();
    }


}
