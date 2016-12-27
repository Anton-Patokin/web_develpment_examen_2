<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use LaravelLocalization;

class HomeController extends Controller
{
    private $language;


    public function __construct()
    {
//        LaravelLocalization::setLocale('fr' );
        $this->language = LaravelLocalization::getCurrentLocale();
    }

    public function index()
    {

        $all_categorys = [];
        foreach (Category::all() as $key => $category) {
            $all_categorys[$key]['category'] = $category;
            $all_categorys[$key]['translation'] = $category->translations()->where('locale', $this->language)->get()->first();
        };


//        foreach ($all_categorys as$category){
////            return $category['category']->url;
//           return $category['translation']->text;
//        }
        return view('home')->with('categories', $all_categorys);
    }
}
