<?php

namespace App\Http\Controllers;

use App\Repositories\VehicleDetailRepository;
use App\Repositories\VehicleImagesRepository;
use Illuminate\Http\Request;

class VehicleImagesController extends Controller
{
    public function upload(Request $request,
                           VehicleDetailRepository $vehicleDetailRepository,
                           VehicleImagesRepository $vehicleImagesRepository){

        $vehicleDetail = $vehicleDetailRepository->show($request->vehicleId);

        $extension = $request->file((string) $request->keyIdentifier)->extension();

        $imageName = $request->imageArea.time().'-'.$request->vehicleId.'.'.$extension;

        $request->file((string) $request->keyIdentifier)->storeAs('images', $imageName);

        $vehicleImagesRepository->store($vehicleDetail, $imageName, $request->imageArea, $request->vehicleId);
    }

    public function uploadOthers(Request $request,
                                 $vehicleId,
                                 VehicleDetailRepository $vehicleDetailRepository,
                                 VehicleImagesRepository $vehicleImagesRepository
    ){

        $vehicleDetail = $vehicleDetailRepository->show($request->vehicleId);

        $extension = $request->file('file')->extension();

        $imageName = 'other'.time().'-'.$request->vehicleId.'.'.$extension;

        $request->file('file')->storeAs('images', $imageName);

        $vehicleImagesRepository->store($vehicleDetail, $imageName, 'other', $vehicleId);

        return response()->json(['message' => 'others']);
    }
}
