<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use Hash;

class RoleRequest extends FormRequest
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
            'name' => ['required','string','min:4',Rule::unique('roles')->ignore($this->route()->parameter('role'))],
            'permission' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'خانة الاسم مطلوبة',
            'name.string' => 'خانة الاسم يجب ان تكون حروف وارقام',
            'name.min' => 'الإسم يجب ألا يقل عن 6 أحرف',
            'name.unique'=>'اسم الصلاحية مكرر',
            'permission.required' => 'يجب إختيار صلاحية على الأقل للمستخدمم',
        ];
    }

    public function validated()
    {
        $data =  parent::validated();
        return $data;
    }
}
