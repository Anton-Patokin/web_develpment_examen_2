<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyLib\AccesDB;
use App\Item;
use App\Collection;
use App\Category;
use App\Item_translation;
use LaravelLocalization;
use App\Item_foto;

class productsController extends Controller
{
    private $custom_selector;
    private $language;

    public function __construct(AccesDB $accesDB)
    {
        $this->middleware('auth');
        $this->language = LaravelLocalization::getCurrentLocale();
        $this->custom_selector = $accesDB;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get pagination of products

        $items = Item::orderBy('created_at', 'ASC')->paginate(12);

        $items_extra = [];
        foreach ($items as $key => $item) {
            ;
            $items_extra[$item->id]['translation'] = $item->translations()->where('locale', $this->language)->get()->first();
            $items_extra[$item->id]['foto'] = $item->fotos()->get()->first();
        };



        $collections = Collection::all();
        return view('admin-items.items', ['items' => $items, 'collections' => $collections,'items_extra'=>$items_extra])->with('categories', $this->custom_selector->get_categories());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title_nl' => 'required|max:255',
            'title_fr' => 'required|max:255',
            'description_nl' => 'required|max:1000',
            'description_fr' => 'required|max:1000',
            'price' => array('required', 'regex:/^\d*(\.\d{2})?$/'),
            'position' => 'required',
            'specification_nl' => 'required|max:1000',
            'specification_fr' => 'required|max:1000',
            'collection' => 'required',
            'category' => 'required'
        ]);

        $item = new Item;
        $item->price = $request->price;
        $item->collection = $request->collection;
        $item->position = $request->position;
        $item->category_id = Category::where('url', $request->category)->first()->id;
        if ($item->save()) {
            $translation_fr = new Item_translation;
            $translation_fr->locale = 'fr';
            $translation_fr->title = $request->title_fr;
            $translation_fr->description = $request->description_fr;
            $translation_fr->specification = $request->specification_fr;
            $item->translations()->save($translation_fr);
            $translation_nl = new Item_translation;
            $translation_nl->locale = 'nl';
            $translation_nl->title = $request->title_nl;
            $translation_nl->description = $request->description_nl;
            $translation_nl->specification = $request->specification_nl;
            $item->translations()->save($translation_nl);

        }

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
