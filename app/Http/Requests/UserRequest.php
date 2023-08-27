<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use Hash;

class UserRequest extends FormRequest
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
            'name' => ['required','string','min:4',Rule::unique('users')->ignore($this->route()->parameter('user'))],
            'email' =>['required','email',Rule::unique('users')->ignore($this->route()->parameter('user'))],
            'password' => 'required|min:6',
            'name.unique' => 'الإسم مكرر منقبل',
            'roles_name'=>'required',
            'status'=>'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'خانة الاسم مطلوبة',
            'name.string' => 'خانة الاسم يجب ان تكون حروف وارقام',
            'name.min' => 'الإسم يجب ألا يقل عن 6 أحرف',
            'email.required'=>'الإيميل مطلوب',
            'email.email'=>'الإيميل غير صحيح',
            'email.unique'=>'الإيميل مكرر',
            'password.required'=>'كلمة المرور مطلوبة',
            'password.min'=>'كلمة المرور يجب ألا تقل عن 6 حروف ',
            'roles_name.required'=>'يجب إختيار الصلاحية',
            'status.required'=>'يجب إختيار الحالة',
        ];
    }

    public function validated()
    {
        $data =  parent::validated();
        return array_merge($data,['admin_id' => auth()->id()]);
    }
}
