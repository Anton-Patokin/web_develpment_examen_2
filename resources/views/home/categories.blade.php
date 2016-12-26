<div class="row home-categories-margin choplin-font">
    <ul class="home-categories">
        @foreach($categories as $category)
            <li class="col-md-1 home-categories-position">
                <img class="home-categories-images " src="{{url('/images/categories/'.$category->url.'.png')}}">
                <h1 class="home-categories-text {{($category->url == 'small_animals' ?'small' : '')}}">{{$category->type_nl}}</h1>
            </li>
        @endforeach
        <li class="col-md-1 home-categories-position">
            <img class="home-categories-images" src="{{url('/images/categories/more.png')}}">
            <h1 class="home-categories-text ">Andere</h1>
        </li>
    </ul>
</div>