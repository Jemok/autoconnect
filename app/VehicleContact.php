<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class VehicleContact extends Model
{
    use Notifiable;

    protected $table = 'vehicle_contacts';

    public function vehicle_detail(){

        return $this->belongsTo(VehicleDetail::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area(){

        return $this->belongsTo(Area::class);
    }
}
