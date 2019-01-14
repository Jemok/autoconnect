<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarSeries extends Model
{
    protected $table = 'car_series';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    public function car_model(){

        return $this->belongsTo(CarModel::class);
    }
}
