<?php
namespace App\Classes;
use App\Category;

class DbCategories{

    public function getCategories() {

        $all_categorys = [];
        foreach (Category::all() as $key => $category) {
            $all_categorys[$key]['category'] = $category;
            $all_categorys[$key]['translation'] = $category->translations()->where('locale',$languge)->get()->first();
        };
        return $all_categorys;
    }

}