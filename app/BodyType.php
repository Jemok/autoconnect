<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BodyType extends Model
{
    /**
     * @var string
     */
    protected $table = 'body_types';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description'
    ];
}
