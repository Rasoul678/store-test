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
            'street'=>'required',
            'distinct'=>'required',
            'floor'=>'required|numeric|min:1',
            'number'=>'required|numeric|min:1',
            'city_id'=>'required|numeric|min:1',
            'description'=>'required',
            'postal_code'=>'required|numeric|min:5',
        ];
    }
}
