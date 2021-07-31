<?php

namespace App\Http\Controllers\Admin\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminContrller extends Controller
{
    public function index($id)
    {
        if(view()->exists($id)){
            return view($id);
        }
        else
        {
            return view('404');
        }

     //   return view($id);
    }

}
