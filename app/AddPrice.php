<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddPrice extends Model
{
    protected $table = 'add_prices';

    /**
     * @var array
     */
    protected $fillable = [
        'weeks',
        'amount',
        'type',
        'status'
    ];
}
