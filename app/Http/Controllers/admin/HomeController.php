<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function show_data(){
        $home = Home::all();
        return view('admin.home', compact('home'));
    }

    public function edit_image(Request $request, $id){
        $home = Home::find($id);

        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('img', $imagename);
            $home->image = $imagename;
        }

        $home->save();

        Alert::success('Image Edit Successfully');
        return redirect()->back();
    }

    public function edit_about_home(Request $request, $id){
        $home = Home::find($id);
        $home->description = $request->description;
        $home->save();
        Alert::success('About Edit Successfully');
        return redirect()->back();
    }
}
