<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function show_about()
    {
        $about = About::all();
        return view('admin.about', compact('about'));
    }

    public function edit_about(Request $request, $id)
    {
        $about = About::find($id);
        $about->description = $request->description;
        $about->save();
        Alert::success('About Edit Successfully');
        return redirect()->back();
    }
}