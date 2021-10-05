<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use App\Models\User; 
use App\Mail\SendContactForm; 
use App\Http\Requests\ContactFormRequest;


class ContactController extends Controller
{
    public function index(): View{
     return view("contact.form");
    }

    public function send(ContactFormRequest $request ){
try{
 
    Mail::to(User::first())->send(
        new SendContactForm(
            $request->input("subject"),
            $request->input("message")
        )
    );
    return back()->with("success","¡El mensaje se ha enviado correctamente!");
}catch(\Exception $exception ){
    return back()->with("error","¡Ha fallado en envio del correo!" . $exception->getMessage());
}

    }
}
