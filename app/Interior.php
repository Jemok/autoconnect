<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interior extends Model
{
    protected $table = 'interiors';

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];
}
