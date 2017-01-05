<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyLib\AccesDB;
use LaravelLocalization;
use App\Item;
Use App\Item_translation;
use App\Faq;

class FaqController extends Controller
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
        $items = Item_translation::where('locale', 'nl')->get();
        $faq = Faq::all();
        return view('admin-items/faq')
            ->with('categories', $this->custom_selector->get_categories())->with('items', $items)
            ->with('faqs', $faq);
    }

    public function add_faq(Request $request)
    {
        $this->validate($request, [
            'title_nl' => 'required|max:255',
            'title_fr' => 'required|max:255',
            'answer_nl' => 'required|max:1000',
            'answer_fr' => 'required|max:1000',
            'show_in' => 'required|max:255'
        ]);

        $faq_nl = new Faq;
        $faq_nl->locale = 'nl';
        $faq_nl->question = $request->title_nl;
        $faq_nl->answer = $request->answer_nl;

        $faq_fr = new Faq;
        $faq_fr->locale = 'fr';
        $faq_fr->question = $request->title_fr;
        $faq_fr->answer = $request->answer_fr;


        if ($request->show_in == 'about_us') {
            $faq_nl->about_us = 1;
            $faq_fr->about_us = 1;
            $faq_fr->save();
            $faq_nl->save();

        }
        $item = Item::find($request->show_in);
        if ($item) {
            $item->faqs()->save($faq_nl);
            $item->faqs()->save($faq_fr);
        }

        return redirect('/faq');
    }
}
