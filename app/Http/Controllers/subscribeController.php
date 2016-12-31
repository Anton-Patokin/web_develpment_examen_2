<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribe;
use Illuminate\Support\Facades\Cookie;

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
        
        return redirect('/');
    }

    public function set_cookie()
    {

        $cookie = Cookie::forever('acceptCookie', 'okey');
        return redirect('/')->withCookie($cookie);
    }
}
