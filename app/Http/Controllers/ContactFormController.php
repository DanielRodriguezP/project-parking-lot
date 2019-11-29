<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Contact;

class ContactFormController extends Controller
{
    public function sendEmail(Request $request){

        $contactForm = Contact::create([
            "name" => $request->contactName,
            "last_name" => $request->contactLastName,
            "email" => $request->contactEmail,
            "description" => $request->contactDescription
        ]);

        $data = array(
            "contactName" => $request->contactName,
            "contactLastName" => $request->contactLastName,
            "contactEmail" => $request->contactEmail,
            "contactDescription" => $request->contactDescription,
            "contactSubject" => 'Correo de '.$request->contactEmail,
            "contactId" => $contactForm->id
        );


        Mail::to(env('MAIL_USERNAME'))->send(new ContactFormMail($data));
        
        return response()->json(["message" => "Email sent successfully"], 200);
    } 
    

}

