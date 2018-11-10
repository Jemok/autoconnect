<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBulkImport extends Model
{
    protected $table = 'user_bulk_imports';

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

    public function bulk_import_images(){

        return $this->hasMany(BulkImportImage::class);
    }

    public function colour_type(){
        return $this->belongsTo(ColourType::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }
}
