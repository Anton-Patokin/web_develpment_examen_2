<div class="row home-categories-margin choplin-font">
    <ul class="home-categories">

        @foreach($categories as $category)

            <li class="col-md-1 home-categories-position"><a class="font-gray"
                                                             href="{{url('/product/'.$category['category']->url)}}">
                    <img class="home-categories-images "
                         src="{{url('/images/categories/'.$category['category']->url.'.png')}}">
                    <h1 class="home-categories-text {{($category['category']->url == 'small_animals' ?'small' : '')}}">{{$category['translation']->text}}</h1>
                </a>
            </li>

        @endforeach
        <li class="col-md-1 home-categories-position">
            <img class="home-categories-images" src="{{url('/images/categories/more.png')}}">
            <h1 class="home-categories-text ">{{trans('messages.other')}}</h1>
        </li>
    </ul>
</div>