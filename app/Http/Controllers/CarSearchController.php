<?php

namespace App\Http\Controllers;

use App\Repositories\CarSearchRepository;
use Illuminate\Http\Request;

class CarSearchController extends Controller
{
    public function showSearchResults(Request $request,
                                      CarSearchRepository $carSearchRepository){
        $car_make = $request->carMake;
        $car_model = $request->carModel;
        $year_from = $request->yearFrom;
        $year_to = $request->yearTo;
        $min_price = $request->minPrice;
        $max_price = $request->maxPrice;
        $keyword =  $request->keyword;
        $location = $request->location;
        $body_type = $request->bodyType;
        $colour_type = $request->colourType;
        $transmission_type = $request->transmission_type;
        $car_condition = $request->carCondition;
        $fuel_type = $request->fuelType;

        $vehicles = $carSearchRepository->searchCar($car_make,
                                        $car_model,
                                        $year_from,
                                        $year_to,
                                        $min_price,
                                        $max_price,
                                        $keyword,
                                        $location,
                                        $body_type,
                                        $colour_type,
                                        $transmission_type,
                                        $car_condition,
                                        $fuel_type);

        return view('front.car-search-results', compact('vehicles', 'car_make', 'car_model', 'carSearchRepository'));
    }
}
