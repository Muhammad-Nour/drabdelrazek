<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SliderRequest extends FormRequest
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
        if(request()->isMethod('post')){
            $requiredRule = 'required';
        }
        elseif(request()->isMethod('put')){
            $requiredRule = 'sometimes';
        }

        return [
            'photo'=>[$requiredRule, 'image'],
            'title_ar'=>['string','nullable'],
            'title_en'=>['string','nullable'],
            'description_ar'=>['string','nullable'],
            'description_en'=>['string','nullable'],
        ];
    }

    public function messages(){
        return [
            'required'  => 'الحقل مطلوب',
            'string'    => 'الحقل يجب أن يكون نصياً',
            'unique'    => 'الحقل مكرر',
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
