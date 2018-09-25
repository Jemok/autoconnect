<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarMake extends Model
{
    /**
     * @var string
     */
    protected $table = 'car_makes';

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function car_model(){

        return $this->hasMany(CarModel::class);
    }
}
