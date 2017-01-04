<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyMail;

class AboutUsController extends Controller
{
    public function send_mail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|max:255|email',
            'message_send' => 'required|max:1000'
        ]);

        Mail::to($request->email)->send(new MyMail($request->email, $request->message_send));
        return redirect('/about-us');
    }
}
