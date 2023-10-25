<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Why_usRequest extends FormRequest
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
            'description_ar'    => ['required','string'],
            'description_en'    => ['nullable','string'],
        ];  
    }

    public function messages(){
        return [
            'required'  => 'هذا الحقل مطلوب',
            'string'    => 'الحقل المطلوب يجب أن يكون نص',
            'max'       =>'الإسم كبير جداً',
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
    }
}
