<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/14/19
 * Time: 7:46 AM
 */

namespace App\Repositories;


use App\CarSeries;

class CarSeriesRepository
{
    public function showFromSlug($car_series){
        return CarSeries::where('slug', $car_series)->firstOrFail();
    }
}