<?php
namespace App\MyLib;
use App\Category;
use App\Item;
use LaravelLocalization;

class AccesDB
{
    private $language;
    public function __construct()
    {
        $this->language =LaravelLocalization::getCurrentLocale();
    }


    public function get_categories(){
        $all_categorys = [];
        foreach (Category::all() as $key => $category) {
            $all_categorys[$key]['category'] = $category;
            $all_categorys[$key]['translation'] = $category->translations()->where('locale', $this->language)->get()->first();
        };
        return $all_categorys;
    }

    public function get_items($hunk){
        $four_first_items = Item::orderBy('position', 'ASC')->take($hunk)->get();
        $items_with_translation = [];
        foreach ($four_first_items as $key => $item) {
            $items_with_translation[$key]['item'] = $item;
            $items_with_translation[$key]['translation'] = $item->translations()->where('locale', $this->language)->get()->first();
        };
        return $items_with_translation;
    }
}