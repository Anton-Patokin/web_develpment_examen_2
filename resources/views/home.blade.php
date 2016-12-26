@extends('layout.app')


@section('content')
    <div class="container-fluid">
        <div class="row carousel-position">
            <div class="overlay">
                <img src="{{url('/images/logo.png')}}" class="image-responsive"/>
            </div>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    {{--<img class="logo-carousel" src="{{url('/images/logo.png')}}">--}}
                    <div class="item active">
                        <img src="{{url('/images/home_01.png')}}" alt="Chania" width="460" height="345">
                    </div>

                    <div class="item">
                        <img src="{{url('/images/home_02.png')}}" alt="Chania" width="460" height="345">
                    </div>

                    <div class="item">
                        <img src="{{url('/images/home_03.png')}}" alt="Flower" width="460" height="345">
                    </div>
                    <div class="progressbar_down"></div>
                    <div class="progressbar"></div>
                </div>
                {{--<div class="progress">--}}
                {{--<div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">--}}
                {{--<span class="sr-only">60% Complete</span>--}}
                {{--</div>--}}
                {{--</div>--}}

            </div>

        </div>
        <div class="container">
            @include('home.introduction')
            @include('home.categories')
            @include('home.hot-items')
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    ------------------------------ banner----------------------------------
                </div>
            </div>
        </div>





    </div>
@endsection


