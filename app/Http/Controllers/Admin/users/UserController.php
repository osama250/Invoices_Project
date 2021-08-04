<?php

namespace App\Http\Controllers\Admin\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index () {
        //echo 'done Users';
        // return view('users.show_users');

        $data = User::orderBy('id','DESC')->get();
        return view('users.show_users', compact('data'));
    }
}
