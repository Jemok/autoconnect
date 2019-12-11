<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class UpdateEmailRequest extends FormRequest
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
        if(Request::path() === 'settings-email') {
            return [
                'email' => 'required|string|email|max:255|unique:users',
                'account_password' => 'required|string'
            ];
        }

        return [
            'email' => 'required|string|email|max:255|unique:users',
        ];
    }
}
