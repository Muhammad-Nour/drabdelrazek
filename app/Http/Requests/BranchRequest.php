<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;


class BranchRequest extends FormRequest
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
            'name_ar'      => 
            ['required','string','max:255'],
            'name_en'      => 
            ['nullable','string','max:255'],
            'address_ar'        => 'required|string',
            'address_en'        => 'nullable|string',
            'description_ar'        => 'required|string',
            'description_en'        => 'nullable|string',
            'map'=>'string|required'
        ];  
    }

    public function messages(){
        return [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'الحقل المطلوب يجب أن يكون نص',
            'name.max' => 'يجب ألا يزيد الإسم عن 255 حرف و رقم',
        ];
    }

    public function validated()
    {
        $data =  parent::validated();

        return array_merge($data,['admin_id' => auth()->id()]);
    }
}
