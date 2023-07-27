<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function show_contact(){
        $contact = Contact::paginate(10);
        return view('admin.contact', compact('contact'));
    }

    public function delete_contact($id){
        $data = Contact::find($id);
        $data->delete();

        Alert::warning('Contact Remove Successfully');
        return redirect()->back();
    }
}
