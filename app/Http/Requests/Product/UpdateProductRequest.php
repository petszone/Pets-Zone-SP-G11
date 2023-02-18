<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
        // return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              => 'sometimes|string|max:255',
            'shortdesc'         => 'sometimes|string|max:255',
            'longdesc'          => 'sometimes|string',
            'url'               => 'sometimes|string|max:255',
            'price'             => 'sometimes|numeric',
            'rebate'            => 'sometimes|numeric',
            'taxrate'           => 'sometimes|numeric',
            'instock'           => 'sometimes|numeric',
            'status'            => 'sometimes|numeric|in:0,1',
            // 'images.*'          => 'required|file|image|mimes:jpeg,png,jpg,gif',
        ];
    }

    public function messages()
    {
        return [
            // 'text.0.type.required'      => 'ادخل اسم المنتج',
        ];
    }
}
