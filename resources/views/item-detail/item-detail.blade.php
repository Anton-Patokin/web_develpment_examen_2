@extends('layout.app')


@section('content')
    @include('logo-top')
    <div class="container">
        <div class="row item-detail-margin-top">

            @if($item != 'false')
                <div class="row">
                    <div class="col-md-12 item-block">
                        <div class="col-md-6 item-detail-container">
                            <div class="item-detail-img-area">
                                @foreach($item->fotos as $key=>$img)
                                    @if($key == "0")
                                        <div class="col-md-12 ">
                                            <img id="img-big" class="img-big"
                                                 src="{{url('/images/items/big/'.$img->url)}}">
                                            <img class="maximize" src="{{url('/images/shapes/maximaze.png')}}">
                                        </div>
                                    @else
                                        <div class="col-md-4">
                                            <div class="overlay-img">
                                                <img id="{{$img->url}}" class="img-small on-active"
                                                     src="{{url('/images/items/small/'.$img->url)}}">
                                            </div>
                                            <p class="small-img-text">Woordje text</p>
                                        </div>
                                    @endif

                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6 item-detail-detail-area">
                            <div class="col-md-12 item-detail-detail-area-tags">
                                <ul id="breadcrumbs-three">
                                    <li><a href="" class="current"><img src="{{url('/images/logo_char.png')}}"></a></li>
                                    @foreach($item->tags as $key=>$tag)
                                        @if($key == 0)
                                            <li>
                                                <span class="breadcrumbs-three-circel {{$item->category->url}}"></span><a
                                                        href=""
                                                        class="extra-padding-breadcrumbs-three">{{$tag->tag}}</a></li>
                                        @else
                                            <li><a href="">{{$tag->tag}}</a></li>
                                        @endif

                                        {{--<li><a href="">Nulla sed lorem risus</a></li>--}}
                                        {{--<li><a href="">Nam iaculis commodo</a></li>--}}
                                        {{--<li><a href="">Current crumb</a></li>--}}
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-12 font-white">
                                <h1 class="choplin-font uppercase font-white font-head">{{$translation->title}}</h1>
                                <h3 class="uppercase font-white font-weight">&#8364; {{$item->price}}</h3>
                                <h4 class="">{{trans('messages.colors')}}</h4>
                                <div class="colors-inline">
                                    @foreach($item->colors as $key=>$color)
                                        <div class="page color-circel color-{{$color->type}}"></div>
                                    @endforeach
                                </div>
                                <h4>{{trans('messages.description')}}</h4>
                                <p>{{$translation->description}}</p>

                                <div class="shape-inline">
                                    @foreach($item->shapes as $key=>$shape)
                                        <div class="shape"><img
                                                    src="{{url('/images/shapes/'.$shape->shape.'.png')}}"></div>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12 item-Specifications font-white">
                            <div class="row">
                                <h4 class="col-md-12">Specifications</h4>

                                <h5 class="col-md-12 uppercase">Dimensions</h5>

                                @foreach($item->dimensions as $key=>$dimension)
                                    <div class="col-md-12">
                                        <p class="col-md-2">
                                            <span>{{$dimension->type}}</span> - &Oslash; {{$dimension->height}}
                                            x{{$dimension->width}}cm</p>
                                    </div>
                                @endforeach
                                <h5 class=" col-md-12 uppercase">Title</h5>
                                <div class="col-md-12">
                                    <p class="col-md-12">
                                        {{$translation->specification}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 carousel-margin-top">
                        <div class="row">
                            <div class="col-md-12  font-white">
                                <h1 class="choplin-font uppercase">Gerelateerde producten</h1>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 items-carousel font-white">
                                @include('item-detail.item-carousel')
                            </div>
                            <div class="col-md-12">
                                <a href="{{url('/view/more/'.$item->category->id)}}"><p
                                            class="choplin-font font-white pull-right">view more</p></a>
                            </div>
                        </div>


                        @include('faq.acoordion')

                        {{--{{ $item_pagination->links() }}--}}
                    </div>
                </div>

            @else
                <div class="row">
                    <div class="col-md-12 item-block">
                        <div class="col-md-12 item-detail-container">
                            <div class="col-md-12">
                                <h1 class="choplin-font uppercase">Item not available</h1>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
    @include('home.subscribe')
@endsection
