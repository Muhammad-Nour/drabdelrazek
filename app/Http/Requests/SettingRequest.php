<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SettingRequest extends FormRequest
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
            //'key'=>['required','string',Rule::unique('settings')->ignore($this->route()->parameter('setting'))],
            'value'=>'string|required',
        ];
    }

    public function messages(){
        return [
            'required'  => 'الحقل مطلوب',
            'string'    => 'الحقل يجب أن يكون نصياً',
        ];
    }

    public function validated()
    {
        $data =  parent::validated();

        if($this->route()->parameter('custom')){
            return array_merge($data,['updated_by' => auth()->id()]);
        }
        else{
            return array_merge($data,['admin_id' => auth()->id()]);
        }
    }
}
