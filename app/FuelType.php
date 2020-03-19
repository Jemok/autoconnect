<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelType extends Model
{
    /**
     * @var string
     */
    protected $table = 'fuel_types';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description'
    ];
}
