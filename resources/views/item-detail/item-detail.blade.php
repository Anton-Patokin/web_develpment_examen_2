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
                                            <img id="img-big" class="img-big" src="{{url('/images/items/big/'.$img->url)}}">
                                            <img class="maximize" src="{{url('/images/shapes/maximaze.png')}}">
                                        </div>
                                    @else
                                        <div class="col-md-4">
                                            <div class="overlay-img">
                                                <img id="{{$img->url}}" class="img-small on-active" src="{{url('/images/items/small/'.$img->url)}}">
                                            </div>
                                            <p class="small-img-text">Woordje text</p>
                                        </div>
                                    @endif

                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6 item-detail-detail-area">

                            <ul id="breadcrumbs-three">
                                <li><a href="" class="current"><span class="breadcrumbs-three-circel dogs"></span><img src="{{url('/images/logo_char.png')}}"></a></li>
                                <li><a href="">Vivamus nisi eros</a></li>
                                <li><a href="">Nulla sed lorem risus</a></li>
                                <li><a href="">Nam iaculis commodo</a></li>
                                <li><a href="" >Current crumb</a></li>
                            </ul>

                        </div>

                    </div>
                </div>



            @else
                <div class="col-md-12">
                    <h1 class="choplin-font uppercase">Item not available</h1>
                </div>
            @endif

        </div>
    </div>
    @include('home.subscribe')
@endsection
