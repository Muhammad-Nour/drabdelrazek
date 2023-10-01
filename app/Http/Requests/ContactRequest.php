<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;


class ContactRequest extends FormRequest
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
            'name'=>'string|required',
            'phone'=>'string|nullable',
            'email'=>'string|required|email',
            'subject'=>'string|nullable',
            'message'=>'string|required',
            'notes'=>'string|nullable',
        ];
    }

    public function messages(){
        return [
            'required'  => 'الحقل مطلوب',
            'string'    => 'الحقل يجب أن يكون نصياً',
            'email'    => 'الحقل يجب أن يكون إيميل',
        ];
    }

    public function validated()
    {
        $data =  parent::validated();

        if($this->route()->parameter('custom')){
            return array_merge($data,['updated_by' => auth()->id()]);
        }
    }

}
