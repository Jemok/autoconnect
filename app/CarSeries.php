<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarSeries extends Model
{
    protected $table = 'car_series';

    public function car_model(){

        return $this->belongsTo(CarModel::class);
    }
}
