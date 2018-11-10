<?php

namespace App\Http\Controllers;

use App\Repositories\BulkImportRepository;
use App\Repositories\VehicleDetailRepository;
use App\Repositories\VehicleImagesRepository;
use Illuminate\Http\Request;

class BulkImageController extends Controller
{
    public function upload(Request $request,
                           BulkImportRepository $bulkImportRepository,
                           VehicleImagesRepository $vehicleImagesRepository){

        $vehicleDetail = $bulkImportRepository->show($request->vehicleId);

        $extension = $request->file((string) $request->keyIdentifier)->extension();

        $imageName = $request->imageArea.time().'-'.$request->vehicleId.'.'.$extension;

        $request->file((string) $request->keyIdentifier)->storeAs('images/cars', $imageName, 'public');

        $vehicleImagesRepository->storeForBulk($vehicleDetail, $imageName, $request->imageArea, $request->vehicleId);
    }

    public function uploadOthers(Request $request,
                                 $vehicleId,
                                 BulkImportRepository $bulkImportRepository,
                                 VehicleImagesRepository $vehicleImagesRepository
    ){

        $vehicleDetail = $bulkImportRepository->show($request->vehicleId);

        $extension = $request->file('file')->extension();

        $imageName = 'other'.time().rand(10, 100).'-'.$request->vehicleId.'.'.$extension;

        $request->file('file')->storeAs('images/cars', $imageName, 'public');

        $vehicleImagesRepository->storeForBulk($vehicleDetail, $imageName, 'other', $vehicleId);

        return response()->json(['message' => 'others']);
    }
}
