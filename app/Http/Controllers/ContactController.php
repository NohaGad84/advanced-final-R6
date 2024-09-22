<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail; 
use App\Models\Contact;

class ContactController extends Controller
{
   
      public function submit(Request $request)
      {
          $this->validate($request, [
              'Name' => 'required|string|max:255',
              'email' => 'required|email|max:255',
              'subject' => 'required|string|max:255',
              'message' => 'required|string',
          ]);
  
          $contact = new Contact;
          $contact->Name = $request->Name;
          $contact->email = $request->email;
          $contact->subject = $request->subject;
          $contact->message = $request->message;
          $contact->save();
  
          $data = [
              'Name' => $request->Name,
              'email' => $request->email,
              'subject' => $request->subject,
              'message' => $request->message,
          ];
  
          Mail::to(config('info@company.com')) 
              ->send(new ContactMail($data));
  
          return back()->with('success', 'Your message has been sent successfully!');
      }
      public function show($id)
{
    $message = Contact::findOrFail($id);

    return view('message_details', compact('message'));
}
  }
