<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAppointmentRequest extends FormRequest
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
            'animaltype' => 'required',
            'appointdate' => 'required|date|after:today',
            'appointtime' => 'required',
            'email' => 'required|email:rfc,dns',
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [
           'animaltype.required' => 'حقل نوع الحيوان مطلوب',
           'appointdate.required' => 'حقل موعد الحجز مطلوب',
           'appointdate.after' => 'يجب أن يكون موعد الحجز بعد تاريخ اليوم',
           'appointtime.required' => 'ًحقل موعد الحجز مطلوب',
           'email.required' => 'حقل الإيميل مطلوب',
           'name.required' => 'حقل الإسم مطلوب',
        ];
    }
}
