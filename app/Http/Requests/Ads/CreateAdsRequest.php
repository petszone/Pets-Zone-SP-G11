<?php

namespace App\Http\Requests\Ads;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdsRequest extends FormRequest
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

            'title'         => 'required',
            'address'       => 'required',
            'description'   => 'required',
            'ads_type'      => 'required',
            'image'         => 'required',
            'city_id'       => 'required',
            'phone'         => 'required|digits:10|numeric|Starts_with:05',
            'email'         => 'required|email:rfc,dns',
        ];
    }

    public function messages()
    {
        return [
           'title.required' => 'حقل العنوان مطلوب',
           'address.required' => 'حقل العنوان مطلوب',
           'description.required' => 'حقل الوصف مطلوب',
           'ads_type.required' => 'حقل نوع الإعلان مطلوب',
           'image.required' => 'حقل الصورة مطلوب',
           'city_id.required' => 'حقل المدينة مطلوب',
           'phone.required' => 'حقل الجوال مطلوب',
           'email.required' => 'حقل الإيميل مطلوب',
        ];
    }
}
