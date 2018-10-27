<?php

namespace App\Http\Controllers;

use App\Exports\VehicleDetailExport;
use App\Imports\VehicleDetailsImport;
use App\Repositories\BulkImportRepository;
use App\Repositories\SingleAdsRepository;
use App\VehicleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
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

    public function importVehicles(Request $request, BulkImportRepository $bulkImportRepository){

        $bulk_import = $bulkImportRepository->store(Auth::user());

        if($request->hasFile('vehicle_file')){

            Excel::import(new VehicleDetailsImport($bulk_import->id, Auth::user()->id), request()->file('vehicle_file'));
        }

        return redirect()->route('confirmBulkImports', $bulk_import->id);
    }

    public function confirmBulkImports($bulkImportId, BulkImportRepository $bulkImportRepository){

        $single_ads = $bulkImportRepository->indexFroBulkImport($bulkImportId);

        return view('bulk-uploads.confirm-imports', compact('bulkImportId', 'single_ads'));
    }
}
