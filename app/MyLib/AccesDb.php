<?php
namespace App\MyLib;

use App\Category;
use App\Item;
use LaravelLocalization;
use App\Item_foto;
Use App\Item_translation;

class AccesDB
{
    private $language;

    public function __construct()
    {
        $this->language = LaravelLocalization::getCurrentLocale();
    }


    public function get_categories()
    {
        $all_categorys = [];
        foreach (Category::all() as $key => $category) {
            $all_categorys[$key]['category'] = $category;
            $all_categorys[$key]['translation'] = $category->translations()->where('locale', $this->language)->get()->first();
        };
        return $all_categorys;
    }

    public function get_items($hunk)
    {
        $four_first_items = Item::orderBy('position', 'ASC')->where('active', '1')->take($hunk)->get();
        $items_with_translation = [];
        foreach ($four_first_items as $key => $item) {
            $items_with_translation[$key]['id'] = $item->id;
            $items_with_translation[$key]['title'] = $item->translations()->where('locale', $this->language)->get()->first()->title;
            $items_with_translation[$key]['price'] = $item->price;
            $items_with_translation[$key]['url'] = $item->fotos()->get()->first()->url;
            $items_with_translation[$key]['category'] = $item->category()->first()->url;
            $items_with_translation[$key]['color'] = $item->colors()->get();
        };
        return $items_with_translation;
    }

    public function search_item($category, $word, $min_price, $max_price)
    {
        $items = "";
        $items_search = [];
        $item_to_push = '';
        $send_array = [];

        $items = Item_translation::where('title', 'like', '%' . $word . '%')
            ->orWhere('description', 'like', '%' . $word . '%')->get();

        if (count($items) > 0) {


            foreach ($items as $key => $item) {

                if ($item->item()->get()->first()->active) {
                    if ($category) {

                        $item_to_push = $item->item()
                            ->whereBetween('price', [$min_price, $max_price])
                            ->whereIn('category_id', $category);

                    } else {
                        $item_to_push = $item->item()
                            ->whereBetween('price', [$min_price, $max_price]);

                    }


                    if (isset($item_to_push->get()[0])) {
                        $item_found = $item_to_push->get()[0];
                        $items_search['item'] = $item_found;
                        $items_search['url'] = $item_found->fotos()->first()->url;
                        $translation = $item_found->translations()->where('locale', $this->language)->get()->first();
                        $items_search['title'] = $translation->title;
                        $items_search['description'] = $translation->description;

//                $item_to_push["url"]=$item;
//                return   $item_to_push->translations()->where('locale', $this->language)->get()->first();


                        array_push($send_array, $items_search);
                     
                    }


                };
            }
            return $send_array;

        }

        return [];
    }

}