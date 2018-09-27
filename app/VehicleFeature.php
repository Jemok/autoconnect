<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleFeature extends Model
{
    protected $table = 'vehicle_features';

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];
}
