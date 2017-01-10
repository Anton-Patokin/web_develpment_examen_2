<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use LaravelLocalization;
use App\Item;
use App\MyLib\AccesDB;
use App\Faq;

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

        $items = Category::where('url', $category)->first()->items()->get();
        
        $items_extra = [];

        foreach ($items as $key => $item) {
            if ($item && $item->active) {
//            return $item->fotos()->get()->first()->url;
                $items_extra[$item->id]['foto'] = $item->fotos()->get()->first()->url;
                $items_extra[$item->id]['translation'] = $item->translations()->where('locale', $this->language)->get()->first();
                $items_extra[$item->id]['colors'] = $item->colors();
                $items_extra[$item->id]['collection'] = $item->collection;
                $items_extra[$item->id]['category'] = $item->category()->first()->url;
            }
        };
        return view('category/category')
            ->with('categories', $this->custom_selector->get_categories())
            ->with('items', $items)
            ->with('extra', $items_extra);


    }

    public function show_product($category, $id)
    {

        $item_pagination = Item::orderBy('created_at', 'ASC')->where('active', 1)->paginate(20);

        $items_extra = [];
        foreach ($item_pagination as $key => $item) {
//            return $item->fotos()->get()->first()->url;
            $items_extra[$item->id]['foto'] = $item->fotos()->get()->first()->url;
            $items_extra[$item->id]['category'] = $item->category()->first()->url;
        };

        $translation = '';
        $faqs = '';

        $item = Item::find($id);
        if ($item && $item->active) {
            $item = Item::find($id)->with('category', 'colors', 'fotos', 'tags', 'dimensions', 'shapes')->where('id', $id)->get()->first();
            $translation = $item->translations()->where('locale', $this->language)->get()->first();
            $faqs = $item->faqs()->where('locale', $this->language)->get();


        } else {
            $item = 'false';
        }

        return view('item-detail/item-detail')
            ->with('categories', $this->custom_selector->get_categories())
            ->with('item', $item)
            ->with('faqs', $faqs)
            ->with('translation', $translation)
            ->with('item_pagination', $item_pagination)
            ->with('items_extra', $items_extra);

    }

    public function about_us()
    {

        $faqs = Faq::where('about_us', '!=', "")->get();
        return view('about-us/about-us')
            ->with('categories', $this->custom_selector->get_categories())
            ->with('faqs', $faqs);
    }
}
