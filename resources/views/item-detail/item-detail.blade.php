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
                                            <img class="img-big" src="{{url('/images/items/big/'.$img->url)}}">
                                        </div>
                                    @else
                                        <div class="col-md-4">
                                            <div class="overlay-img">
                                                <img class="img-small active" src="{{url('/images/items/small/'.$img->url)}}">
                                            </div>
                                        </div>
                                    @endif

                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6 item-detail-detail-area">
                            extras
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
