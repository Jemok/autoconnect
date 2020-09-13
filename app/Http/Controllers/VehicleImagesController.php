<?php

namespace App\Http\Controllers;

use App\Repositories\VehicleDetailRepository;
use App\Repositories\VehicleImagesRepository;
use App\VehicleImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class VehicleImagesController extends Controller
{
    public function upload(Request $request,
                           VehicleDetailRepository $vehicleDetailRepository,
                           VehicleImagesRepository $vehicleImagesRepository){

        $vehicleDetail = $vehicleDetailRepository->show($request->vehicleId);

        $image = $request->file((string) $request->keyIdentifier);

        $img = Image::make($image);

        $canvas = Image::canvas(250, 70, '#FFFFFF');

        $watermark = Image::make(public_path( '/images/back.png'));

        $watermark = $canvas->insert($watermark);

        $img = $img->insert($watermark, 'center');

//        $img = $img->fit(200, 200);


        $extension = $request->file((string) $request->keyIdentifier)->extension();

        $imageRealName = $request->file((string) $request->keyIdentifier)->getClientOriginalName();

        $imageName = $request->imageArea.time().'-'.$request->vehicleId.'.'.$extension;

//        $request->file((string) $request->keyIdentifier)->storeAs('images/cars', $imageName, 'public');

        $img->save(storage_path('app/public/images/cars/'.$imageName));

        $vehicleImagesRepository->store($vehicleDetail, $imageName, $imageRealName, $request->imageArea, $request->vehicleId);
    }

    public function uploadOthers(Request $request,
                                 $vehicleId,
                                 VehicleDetailRepository $vehicleDetailRepository,
                                 VehicleImagesRepository $vehicleImagesRepository
    ){

        $vehicleDetail = $vehicleDetailRepository->show($request->vehicleId);

        $extension = $request->file('file')->extension();

        $imageRealName = $request->file('file')->getClientOriginalName();

        $imageName = 'other'.time().rand(10, 100).'-'.$request->vehicleId.'.'.$extension;

        $request->file('file')->storeAs('images/cars', $imageName, 'public');

        $vehicleImagesRepository->store($vehicleDetail, $imageName, $imageRealName, 'other', $vehicleId);

        return response()->json(['message' => 'others', 'imageName' => $imageName]);
    }

    public function delete(Request $request,
                           $vehicleId,
                           VehicleDetailRepository $vehicleDetailRepository){

        $vehicleDetail = $vehicleDetailRepository->show($vehicleId);

        $vehicle_image = VehicleImage::where('vehicle_detail_id', $vehicleDetail->id)
            ->where('image_real_name', $request->imageName)
            ->firstOrFail();

        $vehicle_image->status = 'deleted';

        $vehicle_image->save();

        return 'ok';
    }
}
