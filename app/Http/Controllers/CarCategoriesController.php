<?php

namespace App\Http\Controllers;

use App\BodyType;
use App\Repositories\CarSearchRepository;
use App\Repositories\UserVerificationRepository;
use App\VehicleDetail;
use Illuminate\Http\Request;

class CarCategoriesController extends Controller
{
    public function filterByCategory($category,
                                     CarSearchRepository $carSearchRepository,
                                     UserVerificationRepository $userVerificationRepository){

        if($category == 'cars'){

            $saloon = BodyType::where('slug', 'saloons')->firstOrFail();

            $hatchback = BodyType::where('slug', 'hatchbacks')->firstOrFail();

            $suv = BodyType::where('slug', '4_wheel_drives_and_suvs')->firstOrFail();

            $station_wagon = BodyType::where('slug', 'station_wagons')->firstOrFail();

            $convertible = BodyType::where('slug', 'convertibles')->firstOrFail();

            $mini = BodyType::where('slug', 'minis')->firstOrFail();

            $coupe = BodyType::where('slug', 'coupes')->firstOrFail();

            $vehicles = VehicleDetail::where('body_type_id', $saloon->id)
                ->orWhere('body_type_id', $hatchback->id)
                ->orWhere('body_type_id', $suv->id)
                ->orWhere('body_type_id', $station_wagon->id)
                ->orWhere('body_type_id', $convertible->id)
                ->orWhere('body_type_id', $mini->id)
                ->orWhere('body_type_id', $coupe->id)
                ->paginate(5);
        }

        if($category == 'motorbikes'){

            $motor_bike = BodyType::where('slug', 'motorbikes')->firstOrFail();

            $quad_bike = BodyType::where('slug', 'quad_bikes')->firstOrFail();

            $vehicles = VehicleDetail::where('body_type_id', $motor_bike->id)
                ->orWhere('body_type_id', $quad_bike->id)
                ->paginate(5);
        }

        if($category == 'trucks_and_trailers'){

            $pickups = BodyType::where('slug', 'pickups')->firstOrFail();

            $trucks = BodyType::where('slug', 'trucks')->firstOrFail();

            $trailers = BodyType::where('slug', 'trailers')->firstOrFail();

            $vehicles = VehicleDetail::where('body_type_id', $pickups->id)
                ->orWhere('body_type_id', $trucks->id)
                ->orWhere('body_type_id', $trailers->id)
                ->paginate(5);
        }

        if($category == 'vans_and_buses'){

            $buses_taxis_and_vans = BodyType::where('slug', 'buses_taxis_and_vans')->firstOrFail();

            $vehicles = VehicleDetail::where('body_type_id', $buses_taxis_and_vans->id)
                ->paginate(5);

        }

        return view('front.category-vehicles', compact(
            'category',
            'area',
            'vehicles',
            'carSearchRepository',
            'userVerificationRepository'));
    }
}
