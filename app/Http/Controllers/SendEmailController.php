<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    //
    function index()
    {
        return view('index');
    }

    function send(Request $request)
    {
        $this->validate($request, [
            'name'  =>  'required',
            'email' =>  'required|email',
            'msg_subject'   =>  'required',
            'message'   =>  'required'
        ]);
        $data = array(
            'name'      =>  $request->name,
            'message'   =>  $request->message
        );

        Mail::to('doktateki@gmail.com')->send(new SendMail($data));
        return back()->with('success', 'Thanks for contacting us!');
    }
}
