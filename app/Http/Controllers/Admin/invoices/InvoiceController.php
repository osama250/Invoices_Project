<?php

namespace App\Http\Controllers\Admin\invoices;

use App\Http\Controllers\Controller;
use App\Models\section;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\invoice;
use App\Models\invoice_details;
use App\Models\invoice_attachments;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    public function create()
    {
        $sections = section::all();
        return view('invoices.add_invoice', compact('sections'));
    }

    public function store(Request $request)
    {
        invoice::create([
            'invoice_number'        => $request->invoice_number,
            'invoice_Date'          => $request->invoice_Date,
            'Due_date'              => $request->Due_date,
            'product'               => $request->product,
            'section_id'            => $request->Section,
            'Amount_collection'     => $request->Amount_collection,
            'Amount_Commission'     => $request->Amount_Commission,
            'Discount'              => $request->Discount,
            'Value_VAT'             => $request->Value_VAT,
            'Rate_VAT'              => $request->Rate_VAT,
            'Total'                 => $request->Total,
            'Status'                => 'غير مدفوعة',
            'Value_Status'          => 2,
            'note'                  => $request->note,
        ]);

        $invoice_id = invoice::latest()->first()->id;
        invoice_details::create([
            'id_Invoice'        => $invoice_id,
            'invoice_number'    => $request->invoice_number,
            'product'           => $request->product,
            'Section'           => $request->Section,
            'Status'            => 'غير مدفوعة',
            'Value_Status'      => 2,
            'note'              => $request->note,
            'user'              => (Auth::user()->name),
        ]);

        if ($request->hasFile('pic')) {

            $invoice_id         = Invoice::latest()->first()->id;
            $image              = $request->file('pic');
            $file_name          = $image->getClientOriginalName();
            $invoice_number     = $request->invoice_number;

            $attachments                    = new invoice_attachments();
            $attachments->file_name         = $file_name;
            $attachments->invoice_number    = $invoice_number;
            $attachments->Created_by        = Auth::user()->name;
            $attachments->invoice_id        = $invoice_id;
            $attachments->save();

            // move pic
            $imageName = $request->pic->getClientOriginalName();
            $request->pic->move(public_path('Attachments/' . $invoice_number), $imageName);
        }

        session()->flash('Add', 'تم اضافة الفاتورة بنجاح');
        return back();
    }

    public function show($id)
    {
        $invoices     = invoice::where('id',$id)->first();
        $details      = invoice_Details::where('id_Invoice',$id)->get();
        $attachments  = invoice_attachments::where('invoice_id',$id)->get();

        return view('invoices.details_invoice', compact('invoices','details','attachments'));
    }

    public function edit($id)
    {
        $invoices = invoice::where('id', $id)->first();
        $sections = section::all();
        return view('invoices.edit_invoice', compact('sections', 'invoices'));
    }

    public function update(Request $request)
    {

        $invoices = invoice::findOrFail($request->invoice_id);
        $invoices->update([
            'invoice_number'    => $request->invoice_number,
            'invoice_Date'      => $request->invoice_Date,
            'Due_date'          => $request->Due_date,
            'product'           => $request->product,
            'section_id'        => $request->Section,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Discount'          => $request->Discount,
            'Value_VAT'         => $request->Value_VAT,
            'Rate_VAT'          => $request->Rate_VAT,
            'Total'             => $request->Total,
            'note'              => $request->note,
        ]);

        session()->flash('edit', 'تم تعديل الفاتورة بنجاح');
        return back();
    }

    public function destroy(Request $request)
    {
        $invoices = invoice_attachments::findOrFail($request->id_file);
        $invoices->delete();
        Storage::disk('public_uploads')->delete($request->invoice_number.'/'.$request->file_name);
        session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();
    }

    public function getproducts($id)
    {
        $products = DB::table("prodcuts")->where("section_id", $id)->pluck("Product_name", "id");
        return json_encode($products);
    }

    public function open_file( $invoice_number,$file_name )
    {
         $files = Storage::disk('public_uploads')->getDriver()
        ->getAdapter()->applyPathPrefix($invoice_number.'/'.$file_name);

        // $files = Storage::disk('public_uploads' , $invoice_number.'/'.$file_name);
        return response()->file($files);
    }

    public function get_file($invoice_number,$file_name)

    {
        $attachments = Storage::disk('public_uploads')->getDriver()
        ->getAdapter()->applyPathPrefix($invoice_number.'/'.$file_name);

        // $attachments = Storage::disk('public_uploads' , $invoice_number.'/'.$file_name);
        return response()->download( $attachments );
    }

}
