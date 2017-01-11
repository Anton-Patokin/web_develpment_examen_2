<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\MyLib\AccesDB;
use App\Item;
use App\Faq;
use LaravelLocalization;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class SearchController extends Controller
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
        return view('search/search')
            ->with('categories', $this->custom_selector->get_categories())
            ->with('items', $this->custom_selector->get_items(4))->with('items_search', '')->with('word', '');

    }
    public function search(Request $request)
    {
        $category_search = [];
        $categorys = Category::all();
        foreach ($categorys as $category) {
            if ($request->has($category->url)) {
                array_push($category_search, (int)$request->input($category->url));
            }
        }
        if ($request->string != '') {
            $word = $request->string;
            $array = $this->custom_selector->search_item($category_search, $request->string, $request->price_1, $request->price_2);
            $page = $request->page;
            $perPage = 5;
            $offset = ($page * $perPage) - $perPage;

            $items_search = new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page, ['path' => $request->url(), 'query' => $request->query()]);
//return $items_search;
//        foreach ($items_search as $item)
//        {
//            return $item[0]->price;
//        }
//            return $items_search;

        } else {
            $items_search = '';
            $word = $request->string;
        }


//return $items_search;
        return view('search/search')
            ->with('categories', $this->custom_selector->get_categories())
            ->with('items', $this->custom_selector->get_items(4))->with('items_search', $items_search)->with('word', $word);
    }
}
