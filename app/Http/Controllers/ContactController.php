<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function contact_form(){
        return view('contact');
    }
    public function add_contact(Request $request){
        $contact = new Contact;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();

        Alert::success('Form Submited Successfully');

        return redirect()->back();
    }
}
