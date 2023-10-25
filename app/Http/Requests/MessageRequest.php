<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'email'             => ['nullable','email'],
            'description'       => ['string','required','regex:/^[\p{L}\p{N}\s]+$/ui']
        ];  
    }

    public function messages(){
        return [
            'required'          => 'هذا الحقل مطلوب',
            'string'            => 'الحقل المطلوب يجب أن يكون نص',
            'max'               =>'الإسم كبير جداً',

            'phone.numeric'     =>'صيغة الرقم غير صحيحة',
            'phone.regex'       =>'رقم الموبايل غير صحيح',

            'name.regex'        =>'الإسم يجب أن يتكون من أحرف فقط',
            'description.regex'     =>'الرسالة يجب أن تتكون من حروف و أرقام فقط',
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
