<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use LaravelLocalization;
use App\Item;
use App\MyLib\AccesDB;

class HomeController extends Controller
{
    private $language;
    private $custom_selector;

    public function __construct(AccesDB $accesDB)
    {
        $this->custom_selector = $accesDB;
        $this->language = LaravelLocalization::getCurrentLocale();
    }

    public function index()
    {
        //
//        return $items_with_translation[0]['item']->url;
//        foreach ($all_categorys as$category){
////            return $category['category']->url;
//           return $category['translation']->text;
//        }
        return view('home')
            ->with('categories', $this->custom_selector->get_categories())
            ->with('items', $this->custom_selector->get_items(4));
    }
}
