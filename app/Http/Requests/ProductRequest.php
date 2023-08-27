<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            ['required','string','max:255',Rule::unique('products')->ignore($this->route()->parameter('product'))],
            'name_en'      => 
            ['required','string','max:255',Rule::unique('products')->ignore($this->route()->parameter('product'))],
            'unit_ar'               => 'required|string',
            'unit_en'               => 'required|string',
            'category_id'           => 'required|exists:categories,id',
            'pre_price'             => 'required|numeric|min:0',
            'price'                 => 'required|numeric|min:0',
            'discount'              => 'required|numeric',
            'purchase_price'        => 'required|numeric',
            'notify'                => 'required|integer|min:1',
            'quantity'              => 'required|integer|min:0',
            'details_ar'            => 'required|string',
            'details_en'            => 'required|string',
            'description_ar'        => 'required|string',
            'description_en'        => 'required|string',
        ];  
    }

    public function messages(){
        return [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'الحقل المطلوب يجب أن يكون نص',
            'name.max' => 'يجب ألا يزيد الإسم عن 255 حرف و رقم',
            'name.unique' => 'اسم الصنف مكرر',

            'numeric'=> 'الحقل يجب أن يكون رقم',
            'min:0'=> 'لا يجب ان يقل الحقل عن  0',
            'min:1'=> 'لا يجب ان يقل الحقل عن  1',
        ];
    }

    public function validated()
    {
        $data =  parent::validated();

        return array_merge($data,['admin_id' => auth()->id()]);
    }
}
