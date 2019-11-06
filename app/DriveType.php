<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriveType extends Model
{
    protected $table = 'drive_types';

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];
}
