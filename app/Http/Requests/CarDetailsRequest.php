<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarDetailsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'car_make' => 'required',
            'car_model' => 'required',
            'car_series' => 'nullable',
            'year'  => 'required',
            'mileage' => 'required|numeric',
            'body_type' => 'required',
            'transmission_type' => 'required',
            'car_condition' => 'required',
            'duty' => 'required',
            'price' => 'required|numeric',
            'negotiable_price' => 'nullable',
            'fuel_type' => 'nullable',
            'engine_size' => 'nullable',
            'interior' => 'nullable',
            'colour_type' => 'nullable',
            'description' => 'nullable'
        ];
    }
}
