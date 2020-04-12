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
            'floor'=>'required|min:1|max:7',
            'number'=>'required|min:1|max:7',
            'city_id'=>'required|min:1',
            'description'=>'required',
            'postal_code'=>'required|min:5|max:7',
        ];
    }
}
