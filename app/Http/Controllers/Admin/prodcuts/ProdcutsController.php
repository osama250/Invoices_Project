<?php

namespace App\Http\Controllers\Admin\prodcuts;

use App\Http\Controllers\Controller;
use App\Models\prodcut;
use App\Models\section;

class ProdcutsController extends Controller
{

    public function index()
    {
        $sections  = section::all();
        $prodcuts  = prodcut::all();
        return view('products.products' , compact('prodcuts' , 'sections'));
    }

}
