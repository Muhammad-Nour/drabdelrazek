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
            'height'            => ['numeric','nullable'],
            'weight'            => ['numeric','nullable'],
            'state_id'             => ['nullable','string'],
            'city'              => ['nullable','string','max:255','regex:/^[\p{L}\p{N}\s]+$/ui'],
            'country_id'           => ['required','string'],
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
            'city.regex'=>' إسم المدينة غير صحيح',

        ];
    }

    public function validated()
    {
        $data =  parent::validated();

        if(request()->isMethod('post')){
            return array_merge($data,['admin_id' => auth()->id()]);
        }

        elseif(request()->isMethod('put')){
            return array_merge($data,['updated_by' => auth()->id()]);
        }

        elseif(request()->isMethod('get'))
        {
            return array_merge($data,['admin_id' => null,'updated_by' => null,]);
        }
    }
}
