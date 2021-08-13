<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoicesRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'invoice_number'        => 'required|unique:invoices|max:255',
            'invoice_Date'          => 'required',
            'Due_date'              => 'required',
            'product'               => 'required',
            'section_id'            => 'required',
            'Amount_collection'     => 'required',
            'Amount_Commission'     => 'required',
            'Rate_VAT'              => 'required',
        ];
    }

    public function messages()
    {
        return [
            'invoice_number.required'       =>'يرجي ادخال اسم الفاتورة',
            'invoice_number.unique'         =>'اسم الفاتورة موجود من قبل ',
            'section_id.required'           => 'يجب اختيار القسم ',
            'invoice_Date.required'         => 'يجب ادخال تاريخ الفاتورة',
            'Due_date.required'             => 'يجب ادخال تاريخ الاستحقاق' ,
            'product.requiredd'             => 'يجب اختبار المنتج' ,
            'section_id.required'           => 'يجب اختيار القسم ',
            'Amount_collection.required'    =>'يجب ادخال المبلغ التحصيل ' ,
            'Amount_Commission.required'    => 'يجب ادخال مبلغ العمولة' ,
            'Rate_VAT.required'             => 'يجب ادخال نسبة ضريبة القيمة المضافة'
        ];
    }
}
