<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColourType extends Model
{
    protected $table = 'colour_types';

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];
}
