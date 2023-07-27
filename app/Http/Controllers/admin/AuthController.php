<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Home;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function admin_login_form()
    {
        return view('admin.login');
    }

    public function admin_login(Request $request)
    {
        $home = Home::all();

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (\Auth::guard('admin')->attempt($request->only('username', 'password'))) {
            return redirect()->route('admin.home')->with(compact('home'));
        }

        return redirect()->back()->with('error', 'Username and Password cannot match!');
    }

    public function admin_logout()
    {
        \Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }


    public function add_admin_form(){
        return view('admin.profile.add-admin');
    }

    public function add_admin(Request $request){
        $request->validate([
            'username'=>'required|unique:admins',
            'password'=>'required',
            'cpassword'=>'same:password'
        ]);

        Admin::create([
            'username'=>$request->username,
            'password'=>\Hash::make($request->password),
        ]);

        Alert::success('Admin Added Successfully!');

        return redirect()->back()->withErrors('error');
    }
}