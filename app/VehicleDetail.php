<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleDetail extends Model
{
    protected $table = 'vehicle_details';

    public function car_make(){
        return $this->belongsTo(CarMake::class);
    }

    public function car_model(){

        return $this->belongsTo(CarModel::class);
    }

    public function body_type(){

        return $this->belongsTo(BodyType::class);
    }

    public function transmission_type(){

        return $this->belongsTo(TransmissionType::class);
    }

    public function car_condition(){

        return $this->belongsTo(CarCondition::class);
    }

    public function duty(){

        return $this->belongsTo(Duty::class);
    }

    public function vehicle_images(){

        return $this->hasMany(VehicleImage::class);
    }

    public function vehicle_contact(){

        return $this->hasOne(VehicleContact::class);
    }

    public function vehicle_payment(){

        return $this->hasOne(VehiclePayment::class);
    }

    public function colour_type(){
        return $this->belongsTo(ColourType::class);
    }

    public function interior(){

        return $this->belongsTo(Interior::class, 'interior', 'id');
    }

    public function vehicle_verification(){

        return $this->hasOne(VehicleVerification::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mpesa_payment_result(){

        return $this->hasOne(MpesaPaymentResult::class);
    }
}
