<?php

namespace App\Http\Controllers\Admin\sections;

use App\Http\Controllers\Controller;
use App\Models\section;

class SectionsController extends Controller
{

    public function index()
    {
        $sections = section::all();
        return view('sections.sections' , compact('sections'));
    }

}
