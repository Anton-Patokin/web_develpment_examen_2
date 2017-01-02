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
        return view('home')
            ->with('categories', $this->custom_selector->get_categories())
            ->with('items', $this->custom_selector->get_items(4));
    }

    public function show_category_product($category)
    {
        return view('item-detail/item-detail')
            ->with('categories', $this->custom_selector->get_categories())
            ->with('items', $this->custom_selector->get_items(4));
    }

    public function show_product($category, $id)
    {
       $item = Item::find($id);
        if($item && $item->active){
            $item = Item::find($id)->with('translations', 'colors', 'fotos', 'tags', 'dimensions', 'shapes')->where('id', $id)->get()->first();
        }else{
            $item = 'false';
        }
        return view('item-detail/item-detail')
            ->with('categories', $this->custom_selector->get_categories())
            ->with('item', $item);
    }
}
