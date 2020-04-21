<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCity extends FormRequest
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
            'city' => 'required|not_regex:/[0-9]/|not_regex:/[.]/',
            'state' => 'required|not_regex:/[0-9]/|not_regex:/[.]/',
            'country' => 'required|not_regex:/[0-9]/|not_regex:/[.]/',
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
            'city.not_regex' => 'City cannot have dot or any digits.',
            'state.not_regex' => 'State cannot have dot or any digits',
            'country.not_regex' => 'Country cannot have dot or any digits',
        ];
    }
}
