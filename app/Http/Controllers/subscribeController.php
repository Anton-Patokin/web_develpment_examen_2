<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribe;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use App\Mail\Subscribe_email;


class subscribeController extends Controller
{
    public function add_subscriber(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email||unique:subscribes',
        ]);
        $subscriber = new Subscribe;
        $subscriber->email = $request->email;
        $subscriber->save();
        Mail::to($request->email)->send(new Subscribe_email());
        return redirect('/');
    }

    public function set_cookie()
    {

        $cookie = Cookie::forever('acceptCookie', 'okey');
        return redirect('/')->withCookie($cookie);
    }
}
