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

        $item_pagination = Item::orderBy('created_at', 'ASC')->paginate(5);

        $items_extra = [];
        foreach ($item_pagination as $key => $item) {
            $items_extra[$item->id]['foto'] = $item->fotos()->get()->first()->url;
            $items_extra[$item->id]['category'] = $item->category()->first()->url;
        };

        $translation = '';
        $item = Item::find($id);
        if ($item && $item->active) {
            $item = Item::find($id)->with('category', 'colors', 'fotos', 'tags', 'dimensions', 'shapes')->where('id', $id)->get()->first();
            $translation = $item->translations()->where('locale', $this->language)->get()->first();

        } else {
            $item = 'false';
        }

        return view('item-detail/item-detail')
            ->with('categories', $this->custom_selector->get_categories())
            ->with('item', $item)->with('translation', $translation)->with('item_pagination',$item_pagination)->with('items_extra',$items_extra);
    }
}
