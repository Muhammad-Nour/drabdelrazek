<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class CustomRequest extends FormRequest
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
            'description_ar'=>'string|nullable',
            'description_en'=>'string|nullable',
            'photo' => 'nullable',
        ];
    }

    public function messages(){
        return [
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
