<?php

namespace App\Http\Controllers\Admin\roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index() {
        // return 'done';
        $roles = Role::orderBy('id','DESC')->get();
        return view('roles.index',compact('roles'));
    }
}
