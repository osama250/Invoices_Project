<?php

namespace App\Http\Controllers\Admin\invoices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\invoice;

class InvoicesController extends Controller
{

    public function index()
    {
        $invoices = invoice::all();
        return view('invoices.invoices' ,compact('invoices'));
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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
