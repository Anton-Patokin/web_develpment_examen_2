@extends('layout.app')
@section('header')
    <meta name="description" content="Kowloon Online Shop is een gespecialiseerde webshop in dierenbenodigheden ter ondersteuning van uw huis-en/ of landbouw dier">
    <title>home-Kowloon</title>
@endsection
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


@endsection


