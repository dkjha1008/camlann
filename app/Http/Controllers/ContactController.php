<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
   public function message(Request $request){


        $user_id = auth()->user()->id;

        $contact = new Contact; 
        $contact->user_id = $user_id; 
        $contact->reciever_id = $request->user_id; 
        $contact->message = $request->message; 
        $contact->save(); 

        $name = '';
        Mail::to($request->email)->send(new ContactMail($name, $contact));
      
      return response()->json(['status'=>'Message recieved.']);
   }
}
