<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
            'address1' => 'required',
            'address2' => 'nullable',
            'city_id' => 'required',
            'comment' => 'nullable',
            'email' => 'required|email:rfc,dns',
            'firstname' => 'required',
            'lastname' => 'required',
            'payment_method' => 'required',
            'postal' => 'required',
            'telephone' => 'required',
        ];
    }

    public function messages()
    {
        return [
           'address1.required' => 'حقل العنوان مطلوب',
           'city_id.required' => 'حقل المدينة مطلوب',
           'email.required' => 'حقل الايميل مطلوب',
           'firstname.required' => 'حقل الاسم الاول مطلوب',
           'lastname.required' => 'حقل الاسم الاخير مطلوب',
           'payment_method.required' => 'حقل نوع عملية الدفع مطلوب',
           'postal.required' => 'حقل الرمز البريدي مطلوب',
           'telephone.required' => 'حقل الهاتف مطلوب',
        ];
    }
}
