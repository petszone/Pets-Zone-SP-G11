<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAnnounceRequest extends FormRequest
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
            'adoptanimalaftertreatment' => 'required',
            // 'animalname'        => 'required',
            'animaltype'        => 'required',
            'description'       => 'required',
            'email'             => 'required|email:rfc,dns',
            'image'             => 'required',
            'keepanimalwith'    => 'required',
            'name'              => 'required',
            'phone'             => 'required|digits:10|numeric|Starts_with:05',
            'google_map_address'=> 'required|Starts_with:https://'
        ];
    }

    public function messages()
    {
        return [
           'adoptanimalaftertreatment.required' => 'هذا الحقل مطلوب',
           'animaltype.required' => 'حقل نوع الحيوان مطلوب',
           'description.required' => 'حقل الوصف مطلوب',
           'email.required' => 'حقل الايميل مطلوب',
           'image.required' => 'حقل الصورة مطلوب',
           'keepanimalwith.required' => 'هذا الحقل مطلوب',
           'name.required' => 'حقل الاسم مطلوب',
           'phone.required' => 'حقل الجوال مطلوب',
           'google_map_address.required' => 'رابط خريطة جوجل مطلوب',
           'google_map_address.Starts_with' => 'رابط خريطة جوجل يجب أن يبدأ بهذه المقدمة',
        ];
    }
}
