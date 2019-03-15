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

    public function vehicle_details(){

        return $this->hasMany(VehicleDetail::class, 'interior', 'id');
    }
}
