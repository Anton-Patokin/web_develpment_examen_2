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



    public  function show_users_faq($string){
        $faqs="";
        if($string == 'all' || $string == ''){
            $string == 'all';
             $faqs = Faq::inRandomOrder()->paginate(5);
        }else{
            $faqs= Faq::where('question', 'like', '%' . $string . '%')
                ->orWhere('answer', 'like', '%' . $string . '%')->paginate(5);
        }
//        return view('white_background/white')
        return view('faq/faq')
            ->with('categories', $this->custom_selector->get_categories())
            ->with('items', $this->custom_selector->get_items(4))->with('faqs',$faqs);

    }

    public function index()
    {
        $items = Item_translation::where('locale', 'nl')->get();
        $faq = Faq::all();
        return view('admin-items/faq')
            ->with('categories', $this->custom_selector->get_categories())->with('items', $items)
            ->with('faqs', $faq);
    }

    public function edit_faq(Request $request, $id_1, $id_2)
    {
        $faq_nl = Faq::find($id_1);
        $faq_fr = Faq::find($id_2);
        $item = "";
        if ($faq_fr && $faq_nl) {
            $faq_nl->question = $request->title_nl;
            $faq_nl->answer = $request->answer_nl;
            $faq_fr->question = $request->title_fr;
            $faq_fr->answer = $request->answer_fr;
            if ($request->show_in == 'about_us') {
                $faq_number = time() . str_random(10);
                $faq_nl->about_us = $faq_number;
                $faq_fr->about_us = $faq_number;
            } else {
                $item = Item::find($request->show_in);
            }

            if ($item) {
                $faq_nl->about_us = '0';
                $faq_fr->about_us = '0';
                $item->faqs()->save($faq_nl);
                $item->faqs()->save($faq_fr);
            }


            $faq_nl->save();
            $faq_fr->save();
            $room = '';
            $faq_id = "";
            if ($faq_nl->about_us) {
                $room = 'about_us';
                $faq_id = $faq_nl->about_us;
            } else {
                $room = 'item';
                $faq_id = $faq_nl->item_id;
            }
            session(['success' => 'Edit']);
            return redirect('/get/faq/' . $room . '/' . $faq_id);
        }
        return redirect('/faq');
    }

    public function delete_faq($room, $id)
    {

        if ($room == 'about_us') {
            $faqs = Faq::where('about_us', $id)->get();
        }
        if ($room == 'item') {
            $faqs = Item::find($id)->faqs()->get();
        }

        foreach ($faqs as $faq) {
            $faq->delete();
        }

        session(['success' => 'delete']);
        return redirect('/faq');
    }


    public function get_faq($room, $id)
    {

        if ($room == 'about_us') {
            $faqs = Faq::where('about_us', $id)->get();
        }
        if ($room == 'item') {
            $faqs = Item::find($id)->faqs()->get();
        }


        $items = Item_translation::where('locale', 'nl')->get();
        if ($faqs) {
            return view('admin-items/faq_detail')
                ->with('categories', $this->custom_selector->get_categories())->with('items', $items)
                ->with('faqs', $faqs);
        }

        return redirect('/faq');

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

        $item="";
        if ($request->show_in == 'about_us') {
            $faq_number = time() . str_random(10);
            $faq_nl->about_us = $faq_number;
            $faq_fr->about_us = $faq_number;
            $faq_fr->save();
            $faq_nl->save();

        }else{
            $item = Item::find($request->show_in);
        }

        if ($item) {
            $item->faqs()->save($faq_nl);
            $item->faqs()->save($faq_fr);
        }
        session(['success' => 'Add']);
        return redirect('/faq');
    }
}
