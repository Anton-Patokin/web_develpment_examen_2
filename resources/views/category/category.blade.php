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

            <div class="col-md-6">
                @foreach($items as $key=>$item)
                    @if($key < 4)
                        <div class="items ">
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
                        <button class="btn btn-pink font-white col-md-5 col-md-offset-4 pull-right-button">Want to know
                            more?
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                @foreach($items as $key=>$item)
                    @if($key > 4)
                        <div class="items ">
                            <div class="col-sm-6 col-md-3 margin-top-items-category">
                                <div class="thumbnail-custom ">
                                    <a class=""
                                       href="{{url('/product/'.$extra[$item->id]['category'].'/'.$item->id)}}"><img
                                                src="{{url('/images/items/small/'.$extra[$item->id]['foto'])}}"
                                                alt="{{$item['title']}}"></a>
                                    <p class="img-hover-text">{{trans('messages.detail')}}</p>
                                    <ul class="colors extra-margin-color">
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
        </div>
    </div>


@endsection