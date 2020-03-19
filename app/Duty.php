<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duty extends Model
{
    protected $table = 'duties';

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];
}
