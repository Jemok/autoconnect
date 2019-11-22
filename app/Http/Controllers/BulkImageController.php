<?php

namespace App\Http\Controllers;

use App\BulkImportImage;
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

        $imageRealName = $request->file((string) $request->keyIdentifier)->getClientOriginalName();

        $imageName = $request->imageArea.time().'-'.$request->vehicleId.'.'.$extension;

        $request->file((string) $request->keyIdentifier)->storeAs('images/cars', $imageName, 'public');

        $vehicleImagesRepository->storeForBulk($vehicleDetail, $imageName, $imageRealName, $request->imageArea, $request->vehicleId);
    }

    public function uploadOthers(Request $request,
                                 $vehicleId,
                                 BulkImportRepository $bulkImportRepository,
                                 VehicleImagesRepository $vehicleImagesRepository
    ){

        $vehicleDetail = $bulkImportRepository->show($request->vehicleId);

        $extension = $request->file('file')->extension();

        $imageRealName = $request->file('file')->getClientOriginalName();

        $imageName = 'other'.time().rand(10, 100).'-'.$request->vehicleId.'.'.$extension;

        $request->file('file')->storeAs('images/cars', $imageName, 'public');

        $vehicleImagesRepository->storeForBulk($vehicleDetail, $imageName, $imageRealName, 'other', $vehicleId);

        return response()->json(['message' => 'others']);
    }

    public function delete(Request $request,
                           $vehicleId){

        $vehicle_image = BulkImportImage::where('user_bulk_import_id', $vehicleId)
            ->where('image_real_name', $request->imageName)
            ->firstOrFail();

        $vehicle_image->status = 'deleted';

        $vehicle_image->save();

        return 'ok';
    }
}
