<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;

class ApiController extends Controller
{
    public  function get_faq(){
        return Faq::inRandomOrder()->paginate(2);
    }
    public  function search_faq($string){

        return Faq::where('question', 'like', '%' . $string . '%')
            ->orWhere('answer', 'like', '%' . $string . '%')->take(10)->get();
    }

}
