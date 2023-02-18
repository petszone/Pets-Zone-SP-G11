<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'name'        => 'sometimes',
            // 'email'       => 'sometimes',
            'firstname'   => 'required',
            'lastname'    => 'required',
            // 'address1'    => 'sometimes',
            // 'postal'      => 'sometimes',
            // 'city_id'     => 'sometimes',
            // 'country_id'  => 'sometimes',
            'telephone'   => 'required',
        ];
    }

    public function messages()
    {
        return [
           'firstname.required' => 'حقل الإيم الأول مطلوب',
           'lastname.required' => 'حقل الإسم الأخير مطلوب',
           'telephone.required' => 'حقل الجوال مطلوب',
        ];
    }
}
