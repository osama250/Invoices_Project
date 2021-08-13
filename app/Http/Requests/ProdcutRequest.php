<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdcutRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Product_name'  => 'required|unique:prodcuts|max:255',
            'section_id'    => 'required' ,
        ];
    }

    public function messages()
    {
        return [
            'Product_name.required' =>'يرجي ادخال اسم المنتج',
            'section_id.required'   =>'يرجى اختيار القسم ',
        ];
    }
}
