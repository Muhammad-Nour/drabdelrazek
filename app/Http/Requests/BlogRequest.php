<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogRequest extends FormRequest
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
            'name_ar'      => ['required','string','max:255'],
            'name_en'      => ['required','string','max:255'],
            'description_ar'        => 'required|string',
            'description_en'        => 'required|string',
            'date'=>'date|required',
            'photo'=>[$requiredRule, 'image'],
        ];
    }

    public function messages(){
        return [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'الحقل المطلوب يجب أن يكون نص',
            'name.max' => 'يجب ألا يزيد الإسم عن 255 حرف و رقم',
            'name.unique' => 'اسم الصنف مكرر',
            'date'=>'هذا الحقل يجب ان يكون تاريخ',
        ];
    }

    public function validated()
    {
        $data =  parent::validated();

        if($this->route()->parameter('news')){
            return array_merge($data,['updated_by' => auth()->id()]);
        }
        else{
            return array_merge($data,['admin_id' => auth()->id()]);
        }
    }
}
