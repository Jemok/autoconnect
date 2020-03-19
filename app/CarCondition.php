<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarCondition extends Model
{
    /**
     * @var string
     */
    protected $table = 'car_conditions';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description'
    ];
}
