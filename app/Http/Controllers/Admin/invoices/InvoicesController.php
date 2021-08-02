<?php

namespace App\Http\Controllers\Admin\invoices;

use App\Http\Controllers\Controller;
use App\Models\invoice;

class InvoicesController extends Controller
{

    public function index()
    {
        $invoices = invoice::all();
        return view('invoices.invoices' , compact('invoices'));
    }

    public function Invoice_Paid()
    {
        $invoices = Invoice::where('Value_Status', 1)->get();
        return view('invoices.invoices_paid',compact('invoices'));
    }

    public function Invoice_unPaid()
    {
        $invoices = Invoice::where('Value_Status',2)->get();
        return view('invoices.invoices_unpaid',compact('invoices'));
    }

    public function Invoice_Partial()
    {
        $invoices = Invoice::where('Value_Status',3)->get();
        return view('invoices.invoices_Partial',compact('invoices'));
    }
}
