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
            'postal_code'=>'required|digits_between:2,5',
            'street'=>'required',
            'distinct'=>'required',
            'floor'=>'required|digits_between:1,5',
            'number'=>'required|digits_between:1,5',
            'description'=>'required',
            'city_id'=>'required|min:1|numeric',
        ];
    }
}
