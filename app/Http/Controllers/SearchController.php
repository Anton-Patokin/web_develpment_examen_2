<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyLib\AccesDB;
use App\Item;
use App\Faq;
use LaravelLocalization;

class SearchController extends Controller
{
    private $language;
    private $custom_selector;

    public function __construct(AccesDB $accesDB)
    {
        $this->custom_selector = $accesDB;
        $this->language = LaravelLocalization::getCurrentLocale();
    }



    public  function index(){

        return view('search/search')
            ->with('categories', $this->custom_selector->get_categories())
            ->with('items', $this->custom_selector->get_items(4))->with('items_search','');

    }
}
