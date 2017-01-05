<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyLib\AccesDB;
use LaravelLocalization;

class FaqController extends Controller
{
    private $language;
    private $custom_selector;

    public function __construct(AccesDB $accesDB)
    {
        $this->custom_selector = $accesDB;
        $this->language = LaravelLocalization::getCurrentLocale();
    }
    public function index(){
        return view('admin-items/faq')
            ->with('categories', $this->custom_selector->get_categories());
    }
    public function add_faq(Request $request){
        $this->validate($request,[
            'title_nl'=>'required|max:255',
            'title_fr'=>'required|max:255',
            'answer_nl'=>'required|max:1000',
            'answer_fr'=>'required|max:1000',
        ]);
        return 'okey';
    }
}
