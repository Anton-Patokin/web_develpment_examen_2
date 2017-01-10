@extends('layout.app')
@section('header')
    <title>home-Kowloon</title>
@endsection
@section('content')
    @include('logo-top')
    <div class="container-fluid">
        @include('carousel.carousel-big')
        <div class="container">

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
                                    <ul class="colors">
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
            <div class="col-md-6">
                <h1>hier komt foto</h1>
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
                                    <ul class="colors">
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