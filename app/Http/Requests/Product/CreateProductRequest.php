<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name'              => 'required|string|max:255',
            'shortdesc'         => 'required|string|max:255',
            'longdesc'          => 'required|string',
            'url'               => 'sometimes|string|max:255',
            'price'             => 'required|numeric',
            'rebate'            => 'sometimes|numeric',
            'taxrate'           => 'sometimes|numeric',
            'instock'           => 'required|numeric',
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
