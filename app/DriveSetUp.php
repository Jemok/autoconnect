<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriveSetUp extends Model
{
    protected $table = 'drive_setups';

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];
}
