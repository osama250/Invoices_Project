<?php

namespace App\Http\Controllers\Admin\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\Hash;

use App\User;

class UserController extends Controller
{
    public function index ()
    {
        $data = User::orderBy('id','DESC')->get();
        return view('users.show_users', compact('data'));
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.Add_user',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'name'       => 'required',
        'email'      => 'required|email|unique:users,email',
        'password'   => 'required|same:confirm-password',
        'roles_name' => 'required'
        ]);

        $input = $request->all();

        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles_name'));
        return redirect()->route('Users.index')->with('success','تم اضافة المستخدم بنجاح');
    }

    public function edit($id)
    {
        $user       = User::find($id);
        $roles      = Role::pluck('name','name')->all();
        $userRole   = $user->roles->pluck('name','name')->all();
        return view('Users.edit',compact('user','roles','userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'name'       => 'required',
        'email'      => 'required|email|unique:users,email,'.$id,
        'password'   => 'same:confirm-password',
        'roles'      => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password']))
        {
            $input['password'] = Hash::make($input['password']);
        }
        else
        {
            $input = array_except($input,array('password'));
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('Users.index')
        ->with('success','تم تحديث معلومات المستخدم بنجاح');
    }

    public function destroy(Request $request)
    {
        User::find($request->user_id)->delete();
        return redirect()->route('Users.index')->with('success','تم حذف المستخدم بنجاح');
    }
}
