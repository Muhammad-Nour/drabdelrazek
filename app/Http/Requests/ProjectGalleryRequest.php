<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectGalleryRequest extends FormRequest
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
            'photo'=>[$requiredRule],
        ];
    }

    public function messages(){
        return [
            'required'  => 'الحقل مطلوب',
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
