<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;


class VehicleDetailExport implements FromCollection
{

    public function collection()
    {
        return new Collection([[
            'car_make_id',
            'car_model_id',
            'year',
            'mileage',
            'body_type_id',
            'transmission_type_id',
            'car_condition_id',
            'duty_id',
            'price',
            'negotiable_price',
            'fuel_type',
            'engine_size',
            'interior',
            'colour_type_id',
            'description',
            'other_features'
        ]]);
    }

}