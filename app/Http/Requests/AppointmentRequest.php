<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;


class AppointmentRequest extends FormRequest
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
            'name'      => ['required','string','max:255'],
            'phone'      => ['required','numeric'],
            'height'      => ['required','numeric'],
            'weight'      => ['required','numeric'],
            'governorate'      => ['required','string','max:255'],
            'city'      => ['required','string','max:255'],
        ];  
    }

    public function messages(){
        return [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'الحقل المطلوب يجب أن يكون نص',
            'max'=>'الإسم كبير جداً'
        ];
    }

    public function validated()
    {
        $data =  parent::validated();

        return array_merge($data);
    }
}
