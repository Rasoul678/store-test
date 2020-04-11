<?php

namespace App\Http\Requests;

use App\Models\Enums\ProductStatus;
use BenSampo\Enum\Rules\Enum;
use BenSampo\Enum\Rules\EnumKey;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'name' => 'required',
            'categories.*' => 'required',
            'description' => 'nullable',
            'type' => 'nullable',
            'price' => 'nullable|numeric',
            'status'=>'nullable',
            'image_url'=>'nullable',
//            'status' => 'required|enum_value:' . ProductStatus::class,
        ];
    }
}
