<?php

namespace App\Http\Controllers;

use App\Exports\VehicleDetailExport;
use App\Http\Requests\BulkUpladFileRequest;
use App\Imports\VehicleDetailsImport;
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

        return view('bulk-uploads.bulk-pictures', compact('vehicleId', 'single_bulk_upload'));
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

        return view('bulk-uploads.admin-bulk-images', compact('vehicleId',
            'single_bulk_upload',
            'vehicle_detail',
            'vehicle_images',
            'other_features'));

    }
}
