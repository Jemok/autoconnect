<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransmissionType extends Model
{
    protected $table = 'transmission_types';

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];
}
