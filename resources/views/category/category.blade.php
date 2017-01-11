@extends('layout.app')
@section('header')
    <title>home-Kowloon</title>
@endsection
@section('content')
    @include('logo-top')
    <div class="container-fluid">
        @include('carousel.carousel-big')
        <div class="container">
            <div class="col-md-12 margin-top">
                <div class="margin-left-category ">
                    <ul id="breadcrumbs-three">
                        <li><a href="" class="current"><img src="{{url('/images/logo_char.png')}}"></a></li>
                        <li>
                            <span class="breadcrumbs-three-circel {{Request::segment(3)}}"></span><a
                                    href=""
                                    class="extra-padding-breadcrumbs-three">{{Request::segment(3)}}</a></li>
                        <li><a href="">Splash´n Fun</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <h1 class="choplin-font uppercase font-white col-md-12">Dog articles</h1>
            </div>
            <div class="col-md-12">
                <h4 id="advanced_filter_small" class="col-md-12 choplin-font">Filter<span
                            class="caret-right-small"></span></h4>
            </div>
            <div class="col-md-12">
                {{Form::open(array('url' => '/product/'.Request::segment(3), 'method' => 'get', 'id'=>'target'))}}
                {{--hidden toevoegen--}}
                <div class="row filter-elemnts col-md-offset-1">
                    <div class="col-md-12 font-size-search">
                        <h4 class="font-20">Category</h4>
                        @foreach(['Splash´n fun','Luxury','New','On sale','Other'] as $category)
                            <div class="checkbox-margin-category">
                                <div class="checkbox">
                                    <label class="checkbox-label-category">
                                        {{Form::checkbox('collection',$category,false,array('class'=>'radio-custom-category'))}} {{$category}}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-12">
                        <h4 class="font-20">Price range</h4>
                        <div id="slider-range" class="col-md-5 category filter-category"></div>
                        <div class="col-md-6 col-md-offset-1">
                            <div id="amount_1" class="price-box category col-md-5"></div>
                            <p class="col-md-2 line-category">-</p>
                            <div id="amount_2" class="price-box category col-md-5"></div>
                            <input type="text" id="input_amount_1" name="price_1" hidden>
                            <input type="text" id="input_amount_2" name="price_2" hidden>
                        </div>
                    </div>

                </div>

                {{Form::close()}}
            </div>
            <div class="col-md-12">
                <hr class="devider_filter_category">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class=" margin-left-button">
                        <div class="btn-group ">
                            <button type="button" class="btn btn-filter dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                Sort by relevance<img class="pull-right "
                                                      src="{{url('/images/shapes/up_down.png')}}">
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item col-md-12" href="#" data-sort="asc">Price: low to high</a>
                                <a class="dropdown-item col-md-12" href="#" data-sort="desc">Price: high to low</a>
                                <a class="dropdown-item col-md-12" href="#" data-sort="latest">latest</a>
                                <a class="dropdown-item col-md-12" href="#" data-sort="oldest">Oldest</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <p class="pull-right margin-left-counter">{{Request::segment(3)}} items:{{count($items)}} of 56</p>
                </div>
            </div>
            <div id="container-products">
                <div class="col-md-6">
                    @foreach($items as $key=>$item)
                        @if($key < 4)

                            <div class="items search-element" data-price="{{$item->price}}" data-collection="{{$item->collection}}">
                                <div class="col-sm-6 col-md-6 margin-top-items-category">
                                    <div class="thumbnail-custom {{($key==3)?'thumbnail-small':''}}">
                                        <a class=""
                                           href="{{url('/product/'.$extra[$item->id]['category'].'/'.$item->id)}}"><img
                                                    src="{{url('/images/items/small/'.$extra[$item->id]['foto'])}}"
                                                    alt="{{$item['title']}}"></a>
                                        <p class="img-hover-text">{{($key!=3)?trans('messages.detail'):trans('messages.more')}}</p>
                                        <ul class="colors {{($key!=3)?'extra-margin-color':''}}">
                                            @if(count($extra[$item->id]['colors'])<= 3)
                                                @foreach($extra[$item->id]['colors'] as $color)
                                                    <li class="color-circel color-{{$color->type}}"></li>
                                                @endforeach
                                            @else
                                                <li class="color-four">
                                                    <span>{{count($extra[$item->id]['colors'])}}</span>
                                                </li>
                                            @endif
                                        </ul>
                                        <div class="caption">
                                            <p class="choplin-font">{{$extra[$item->id]['translation']->title}}
                                                <span
                                                        class="choplin-font pull-right">&#8364; {{$item->price}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif
                    @endforeach
                </div>
                @if(count($items)>=5)
                    <div class="col-md-6 margin-top-big-img">
                        <div class="col-md-12 item-detail-container heigt_category-img">
                            <div class="item-detail-img-area ">
                                <div class="col-md-12 ">
                                    <img id="img-big " class="img-big img_category"
                                         src="{{url('/images/items/trim/'.$extra[$items[5]->id]['foto'])}}">
                                </div>
                                <div class="col-md-12">
                                    <h3>{{$extra[$items[5]->id]['translation']->title}}</h3>
                                    <p>{{$extra[$items[5]->id]['translation']->description}}</p>
                                </div>
                                <h4 class="col-md-3 uppercase choplin-font">&#8364 {{$items[5]->price}}</h4>
                                <button class="btn btn-pink font-white col-md-5 col-md-offset-4 pull-right-button">Want
                                    to
                                    know
                                    more?
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-md-12">
                    @foreach($items as $key=>$item)
                        @if($key > 4)

                            <div class="items search-element" data-price="{{$item->price}}" data-collection="{{$item->collection}}">
                                <div class="col-sm-6 col-md-3 margin-top-items-category">
                                    <div class="thumbnail-custom {{($key==3)?'thumbnail-small':''}}">
                                        <a class=""
                                           href="{{url('/product/'.$extra[$item->id]['category'].'/'.$item->id)}}"><img
                                                    src="{{url('/images/items/small/'.$extra[$item->id]['foto'])}}"
                                                    alt="{{$item['title']}}"></a>
                                        <p class="img-hover-text">{{($key!=3)?trans('messages.detail'):trans('messages.more')}}</p>
                                        <ul class="colors {{($key!=3)?'extra-margin-color':''}}">
                                            @if(count($extra[$item->id]['colors'])<= 3)
                                                @foreach($extra[$item->id]['colors'] as $color)
                                                    <li class="color-circel color-{{$color->type}}"></li>
                                                @endforeach
                                            @else
                                                <li class="color-four">
                                                    <span>{{count($extra[$item->id]['colors'])}}</span>
                                                </li>
                                            @endif
                                        </ul>
                                        <div class="caption">
                                            <p class="choplin-font">{{$extra[$item->id]['translation']->title}}
                                                <span
                                                        class="choplin-font pull-right">&#8364; {{$item->price}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        @endif
                    @endforeach
                </div>
                <div class="col-md-12 col-md-offset-5">
                    {{ $items->links() }}
                </div>


            </div>
            <div id="find-box" class="col-md-12">

            </div>

        </div>



@endsection