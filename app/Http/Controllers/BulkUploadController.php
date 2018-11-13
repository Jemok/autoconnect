<?php

namespace App\Http\Controllers;

use App\Exports\VehicleDetailExport;
use App\Http\Requests\BulkApprovalRequest;
use App\Http\Requests\BulkUpladFileRequest;
use App\Http\Requests\SetBulkVehicleAsNotApprovedRequest;
use App\Imports\VehicleDetailsImport;
use App\Notifications\AdDisapprovedNotification;
use App\Notifications\BulkPaymentNotification;
use App\Repositories\BulkImportRepository;
use App\Repositories\SingleAdsRepository;
use App\Repositories\VehicleImagesRepository;
use App\VehicleDetail;
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


    public function startBulkUpload(){

        return view('bulk-uploads.start-uploading');
    }

    public function downloadExcelTemplate(){


        return Excel::download(new VehicleDetailExport(), 'uniautoconnect.xlsx');

    }

    public function saveBulkUpload(){

        return view('bulk-uploads.save');
    }

    public function importVehicles(BulkUpladFileRequest $request, BulkImportRepository $bulkImportRepository){

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

        $validator->validate();


        $bulk_import = $bulkImportRepository->store(Auth::user());

        $bulkImportRepository->storeBulkImportStatus($bulk_import, 'uploading');

        if($request->hasFile('vehicle_file')){

            Excel::import(new VehicleDetailsImport($bulk_import->id, Auth::user()->id), request()->file('vehicle_file'));
        }

        return redirect()->route('confirmBulkImports', $bulk_import->id);
    }

    public function confirmBulkImports($bulkImportId,
                                       BulkImportRepository $bulkImportRepository,
                                       VehicleImagesRepository $vehicleImagesRepository){

        $single_ads = $bulkImportRepository->indexFroBulkImport($bulkImportId);

        return view('bulk-uploads.confirm-imports', compact('bulkImportId',
            'single_ads',
            'vehicleImagesRepository'));
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
                                             VehicleImagesRepository $vehicleImagesRepository){

        $single_ads = $bulkImportRepository->indexFroBulkImport($bulkImportId);

        return view('bulk-uploads.index-for-admin', compact('bulkImportId',
            'single_ads',
            'vehicleImagesRepository'));
    }

    public function indexBulkUploadsForUser(BulkImportRepository $bulkImportRepository){

        $bulk_imports = $bulkImportRepository->indexForUser(Auth::user()->id);

        return view('bulk-uploads.index-for-user', compact('bulk_imports'));
    }


    public function adminManageBulkImages($bulkImportId,
                                          $singleBulkUploadId,
                                          BulkImportRepository $bulkImportRepository,
                                          VehicleImagesRepository $vehicleImagesRepository){

        $vehicle_detail = $bulkImportRepository->showSingleBulkImport($singleBulkUploadId, $bulkImportId);

        $vehicle_images = $vehicleImagesRepository->indexForBulUploadVehicle($singleBulkUploadId);

        $other_features = json_decode($vehicle_detail->other_features, true);

        $vehicleId = $singleBulkUploadId;

        $single_bulk_upload = $bulkImportRepository->showSingleBulkImport($singleBulkUploadId, $bulkImportId);

        $disapproval_reasons = $bulkImportRepository->getDisapprovalReasonsNotResolvedOrCorrected($singleBulkUploadId);

        return view('bulk-uploads.admin-bulk-images', compact('vehicleId',
            'single_bulk_upload',
            'disapproval_reasons',
            'vehicle_detail',
            'vehicle_images',
            'other_features'));
    }

    public function setBulkVehicleAsApproved($userBulkImportId,
                                             $status,
                                             BulkImportRepository $bulkImportRepository){

        $user_bulk_import = $bulkImportRepository->show($userBulkImportId);

        $bulkImportRepository->updateApprovalStatus($user_bulk_import, $status);

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
                                                BulkImportRepository $bulkImportRepository){

        $user_bulk_import = $bulkImportRepository->show($userBulkImportId);

        $bulkImportRepository->updateApprovalStatus($user_bulk_import, $status);

        $bulkImportRepository->saveDisapprovalReason($user_bulk_import, $setBulkVehicleAsNotApprovedRequest->reason, 'not_resolved');

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
                                      BulkImportRepository $bulkImportRepository){

        $user_bulk_import = $bulkImportRepository->show($userBulkImportId);

        $bulkImportRepository->updateApprovalStatus($user_bulk_import, $status);

        $bulkImportRepository->updateDisapprovalReason($userBulkImportId, $disapprovalReasonId, $status);

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

        $user->notify(new BulkPaymentNotification($bulk_import, $bulk_import_approval));

        flash()->overlay('The Payment instructions were sent successfully', 'Sent');

        return redirect()->back();
    }
}
