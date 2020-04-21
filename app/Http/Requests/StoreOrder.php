<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
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
            'postal_code' => 'required|digits:10',
            'street' => 'required|not_regex:/[0-9]/|not_regex:/[.]/',
            'distinct' => 'required|not_regex:/[0-9]/|not_regex:/[.]/',
            'floor' => 'required|digits_between:1,3',
            'number' => 'required|digits_between:1,3',
            'description' => 'required',
            'city_id' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'street.not_regex' => 'Street cannot have dot or any digits.',
            'distinct.not_regex' => 'Distinct cannot have dot or any digits',
        ];
    }
}
