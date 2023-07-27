<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function change_password_form(){
        return view('admin.profile.change-password');
    }

    public function change_password(Request $request){

        if(!(\Hash::check($request->currentPassword, \Auth::guard('admin')->user()->password))){
            return redirect()->back()->with("currentPass_error","Your current password does not matches with the password.");
        }

        if(strcmp($request->currentPassword, $request->newPassword) == 0){
            return redirect()->back()->with("newPass_error","New Password cannot be same as your current password.");
        }

        if(strcmp($request->newPassword, $request->confirmPassword) != 0){
            return redirect()->back()->with("confirmPass_error", "Confirm Password cannot match.");
        }

        
        $user_id = \Auth::guard('admin')->user()->id;
        $admin = Admin::find($user_id);
        $admin->password = \Hash::make($request->newPassword);
        $admin->save();

        Alert::success('Password Change Successfully!');

        return redirect()->back();
    }

}
