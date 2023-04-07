<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact_message_store(Request $request)
    {
        $contact = new Contact();
        $contact->c_fname = $request->c_fname;
        $contact->c_lname = $request->c_lname;
        $contact->c_email = $request->c_email;
        $contact->c_subject = $request->c_subject;
        $contact->c_message = $request->c_message;
        $contact->save();
    }
}
