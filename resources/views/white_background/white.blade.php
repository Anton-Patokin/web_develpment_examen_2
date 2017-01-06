@extends('layout.app')


@section('content')
    @include('logo-top')
    <div class="container-fluid">
        @include('carousel.carousel-big')
        <div class="container">
            @include('home.introduction')
            @include('home.categories')
            @include('home.hot-items')
            @include('home.subscribe')

        </div>
    </div>
    <div id="white-background" class="white-background">
        <div class="container-fluid">
            <div class='row'>
                <div class="col-md-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-1"> @yield('filter')</div>
                            <img class="pull-right x-close"
                                 src="{{url('/images/white-background/x_close.png')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-md-offset-1">
                @yield('white_content')

            </div>

        </div>
    </div>

@endsection