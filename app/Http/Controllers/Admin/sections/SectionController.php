<?php

namespace App\Http\Controllers\Admin\sections;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\section;

class SectionController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'section_name'          => 'required|unique:sections|max:255',
        ],[

            'section_name.required' =>'يرجي ادخال اسم القسم',
            'section_name.unique'   =>'اسم القسم مسجل مسبقا',
        ]);

            section::create([
                'section_name' => $request->section_name,
                'description'  => $request->description,
                'Created_by'   => (Auth::user()->name),

            ]);
            session()->flash('Add', 'تم اضافة القسم بنجاح ');
            return redirect('/Sections');
    }

    public function update(Request $request)
    {
        $id = $request->id;                     // id of section to edit by

        $this->validate($request, [

            'section_name' => 'required|max:255|unique:sections,section_name,'.$id,
            'description'  => 'required',
        ],[

            'section_name.required' =>'يرجي ادخال اسم القسم',
            'section_name.unique' =>'اسم القسم مسجل مسبقا',
            'description.required' =>'يرجي ادخال البيان',
        ]);

        $sections = section::find($id);
        $sections->update([
            'section_name' => $request->section_name,
            'description'  => $request->description,
        ]);

        session()->flash('edit','تم تعديل القسم بنجاج');
        return redirect('/Sections');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        section::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/Sections');
    }
}
