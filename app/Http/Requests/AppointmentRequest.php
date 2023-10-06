<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;



class AppointmentRequest extends FormRequest
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
            'name'              => ['required','string','max:255','regex:/^(?!.*\d)[a-z\p{Arabic}\s]{2,66}$/ui'],
            'phone'             => ['required','numeric','regex:/^01\d{9}$/'],
            'height'            => ['required','numeric'],
            'weight'            => ['required','numeric'],
            'governorate'       => ['required','string','max:255','regex:/^(?!.*\d)[a-z\p{Arabic}\s]{2,66}$/ui'],
            'city'              => ['required','string','max:255','regex:/^[\p{L}\p{N}\s]+$/ui'],
        ];  
    }

    public function messages(){
        return [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'الحقل المطلوب يجب أن يكون نص',
            'max'=>'الإسم كبير جداً',

            'height.numeric'=>'قيمة الطول غير صحيحة',
            'weight.numeric'=>'قيمة الوزن غير صحيحة',

            'phone.numeric'=>'صيغة الرقم غير صحيحة',
            'phone.regex'=>'رقم الموبايل غير صحيح',

            'name.regex'=>' الإسم غير صحيح',
            'governorate.regex'=>' إسم المحافظة غير صحيح',
            'city.regex'=>' إسم المدينة غير صحيح',

        ];
    }

    public function validated()
    {
        $data =  parent::validated();

        return array_merge($data);
    }
}
