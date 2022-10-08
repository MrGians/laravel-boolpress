<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{

    public function send(Request $request)
    {
        $data = $request->all();

        $validation = Validator::make($data, [
            'email' => 'required|email',
            'message' => 'required|string'
        ],[
            'email.required' => 'L\'email è obbligatoria',
            'email.email' => 'Il campo Email deve contenere un\'email valida',
            'message.required' => 'Il Messaggio è obbligatorio',
        ]);

        if($validation->fails()){
            return response()->json(['errors' => $validation->errors()]);
        }

        $email = new ContactUsMail($data['email'], $data['message']);
        Mail::to(env('MAIL_CONTACT_US'))->send($email);
        
        return response('', 204);
    }
}
