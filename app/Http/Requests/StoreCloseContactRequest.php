<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreCloseContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *s
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
            'cpno' => 'required|string|max:255',
            'fname' => 'required|string',
            'lname' => 'required|string',
            'addr' => 'required|string',
            'lat' => ['numeric'],
            'long' => ['numeric'],
            'enum_password' =>'required|string',
            'enum_email' =>'required|string',
        ];
    }

    public function messages()
    {
        return [
            'lat.numeric' => 'Latitude must be number!',
            'lng.numeric' => 'Longitude must be number!',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
