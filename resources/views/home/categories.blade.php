<div class="row home-categories-margin">
    @foreach($categories as $category)
        <div class="col-md-2 home-categories-position">
            <img class="home-categories-images " src="{{url('/images/categories/'.$category->url.'.png')}}">
            <h1 class="home-categories-text {{($category->url == 'small_animals' ?'small' : '')}}">{{$category->type_nl}}</h1>
        </div>
    @endforeach
    <div class="col-md-2 home-categories-position">
        <img class="home-categories-images" src="{{url('/images/categories/more.png')}}">
        <h1 class="home-categories-text ">Andere</h1>
    </div>

</div>