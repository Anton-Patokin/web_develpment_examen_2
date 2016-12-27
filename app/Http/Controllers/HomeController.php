<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use LaravelLocalization;
use App\Item;

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

        $four_first_items = Item::orderBy('position', 'ASC')->take(4)->get();
        $items_with_translation = [];
        foreach ($four_first_items as $key => $item) {
            $items_with_translation[$key]['item'] = $item;
            $items_with_translation[$key]['translation'] = $item->translations()->where('locale', $this->language)->get()->first();
        };

//        return $items_with_translation[0]['item']->url;
//        foreach ($all_categorys as$category){
////            return $category['category']->url;
//           return $category['translation']->text;
//        }
        return view('home')->with('categories', $all_categorys)->with('items', $items_with_translation);
    }
}
