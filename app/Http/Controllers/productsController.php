<?php

namespace App\Http\Controllers;

use App\Item_shape;
use Illuminate\Http\Request;
use App\MyLib\AccesDB;
use App\Item;
use App\Collection;
use App\Category;
use App\Item_translation;
use LaravelLocalization;
use App\Item_foto;
use App\Item_color;
use App\Item_dimension;
use App\Item_tag;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Input;
use Image;


class productsController extends Controller
{
    private $custom_selector;
    private $language;
    private $categories;

    public function __construct(AccesDB $accesDB)
    {
        $this->middleware('auth');
        $this->language = LaravelLocalization::getCurrentLocale();
        $this->custom_selector = $accesDB;
        $this->categories = $this->custom_selector->get_categories();
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
            $items_extra[$item->id]['translation'] = $item->translations()->where('locale', $this->language)->get()->first();
            $items_extra[$item->id]['foto'] = $item->fotos()->get()->first();
        };
        $collections = Collection::all();
        return view('admin-items.items', ['items' => $items, 'collections' => $collections, 'items_extra' => $items_extra])
            ->with('categories', $this->categories);
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
            'price' =>'required|numeric|between:0,999999.99',
//            'price' => 'numeric|min:1|max:5|regex:/^\d*(\.\d{2})?$/\'',
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

        $collections = Collection::all();
        $item = Item::find($id)->with('translations', 'colors', 'fotos', 'tags', 'dimensions', 'shapes')->where('id', $id)->get()->first();
        return view('admin-items.show-item', ['item' => $item, 'collections' => $collections])
            ->with('categories', $this->categories);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'edit';
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
        $item = Item::find($id);
        $item->delete();
        return redirect('/products');
    }

    public function delete_from_product($table, $id, $item_id)
    {
        if($table == 'tag'){
            Item_tag::find($id)->delete();
        }
        if($table == 'dimensions'){
            Item_dimension::find($id)->delete();
        }
        if ($table == 'color') {
            Item_color::find($id)->delete();
        }

        if ($table == 'shape') {
            Item_shape::find($id)->delete();
        }
        if ($table == 'foto') {
            Item_foto::find($id)->delete();
        }
        return redirect('/products/' . $item_id);
    }


    public function add_to_product(Request $request, $table, $id)
    {

        if($table == 'active'){

            $item=Item::find($id);
            if($item->active){
                $item->active = 0;
            }else{
                $item->active = 1;
            }
            $item->save();
            
        }

        if($table == 'tag'){
            $this->validate($request, [
                'tag' => 'required|max:255',
            ]);

            $tag = new Item_tag;
            $tag->tag = $request->tag;

            Item::find($id)->tags()->save($tag);

            return redirect('products/' . $id);
        }


        if($table == 'dimensions'){
            $this->validate($request, [
                'dimensions' => 'required|max:255',
                'height'=>'required|numeric|min:1|max:10000',
                'width'=>'required|numeric|min:1|max:10000',
            ]);

            $dimension = new Item_dimension;
            $dimension->type = $request->dimensions;
            $dimension->height =$request->height;
            $dimension->width=$request->width;

            Item::find($id)->dimensions()->save($dimension);

            return redirect('products/' . $id);
        }

        if ($table == 'color') {
            $this->validate($request, ['color' => 'required']);
            $color = new Item_color;
            $color->type = $request->color;

            Item::find($id)->colors()->save($color);

            return redirect('products/' . $id);
        }

        if ($table == 'shape') {
            $this->validate($request, ['shape' => 'required']);
            $shape = new Item_shape;
            $shape->shape = $request->shape;

            Item::find($id)->shapes()->save($shape);

            return redirect('products/' . $id);
        }

        if ($table == 'foto') {

            $this->validate($request, [
                'url' => 'required|mimes:jpeg,png'
            ]);
            $new_file_name = time() . '.' . $request->url->guessClientExtension();
            $request->url->move(base_path() . '/public/images/items/original/', $new_file_name);
            Image::make(public_path('/images/items/original/'.$new_file_name))->resize(230, 160)->save(public_path('/images/items/small/'.$new_file_name));
            Image::make(public_path('/images/items/original/'.$new_file_name))->resize(460, 260)->save(public_path('/images/items/big/'.$new_file_name));

            $foto = new Item_foto;
            $foto->url = $new_file_name;
            Item::find($id)->fotos()->save($foto);
        }
        return redirect('products/' . $id);
    }

    public function update_on_items(Request $request, $id_item)
    {

        $request->price = (string)$request->price;
        $this->validate($request, [
            'title_nl' => 'required|max:255',
            'title_fr' => 'required|max:255',
            'description_nl' => 'required|max:1000',
            'description_fr' => 'required|max:1000',
            'price' =>'required|numeric|between:0,999999.99',
//            'price' => 'numeric|min:1|max:5|regex:/^\d*(\.\d{2})?$/\'',
            'position' => 'required',
            'specification_nl' => 'required|max:1000',
            'specification_fr' => 'required|max:1000',
            'collection' => 'required',
            'category' => 'required'
        ]);

        $item = Item::find($id_item);
        $item->price = $request->price;
        $item->collection = $request->collection;
        $item->position = $request->position;
        $item->category_id = Category::where('url', $request->category)->first()->id;
        $item->save();


        $translation_fr = Item_translation::find($request->id_fr);
        $translation_fr->locale = 'fr';
        $translation_fr->title = $request->title_fr;
        $translation_fr->description = $request->description_fr;
        $translation_fr->specification = $request->specification_fr;
        $item->translations()->save($translation_fr);
        $translation_nl = Item_translation::find($request->id_nl);
        $translation_nl->locale = 'nl';
        $translation_nl->title = $request->title_nl;
        $translation_nl->description = $request->description_nl;
        $translation_nl->specification = $request->specification_nl;
        $item->translations()->save($translation_nl);


        return redirect('products/' . $id_item);
    }
}
