<?php

namespace App\Http\Controllers\Admin\invoices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\invoice;

class invoicesArchiveController extends Controller
{
    public function index()
    {
        $invoices = invoice::onlyTrashed()->get();
        return view('Invoices.Archive_Invoices',compact('invoices'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $id         = $request->invoice_id;
        $flight     = Invoice::withTrashed()->where('id', $id)->restore();
        session()->flash('restore_invoice');
        return redirect('/Invoices');
    }

    public function destroy(Request $request)
    {
        $invoices = invoice::withTrashed()->where('id',$request->invoice_id)->first();
        $invoices->forceDelete();
        session()->flash('delete_invoice');
        return redirect('/Archive_Invoice');
    }
}
