@extends('layout.app')


@section('content')
    @include('logo-top')
    <div class="container-fluid">
        <img class="about-us-img" src="{{url('/images/backgrounds/about_us.png')}}">
    </div>
    <div class="container">
        <div class="row about-us-img-margin-top">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="margin-left-tags">
                        <ul id="breadcrumbs-three">
                            <li><a href="" class="current"><img src="{{url('/images/logo_char.png')}}"></a></li>
                            <li><a href="{{url('/about-us')}}">about us</a></li>
                        </ul>
                    </div>

                </div>
                <div class="font-white about-us-content">
                    <div class="col-md-12">
                        <h1 class="choplin-font uppercase">About us</h1>
                    </div>

                    
                        <div class="col-md-8">
                            <h3 class="choplin-font uppercase">
                                Kowloon
                            </h3>
                            <p>Pet Concept, active since 1998, is developing, importing and exporting products for pets
                                worldwide.</p>
                            <br>
                            <p> natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                ipsa
                                quae ab illo inventore veritatis et quasi architecto beatae vitae sequi nesciunt.</p>
                        </div>
                        <div class="col-md-3 col-md-offset-1 about-us-contact">
                            <h3 class="choplin-font uppercase">Contact</h3>
                            <ul>
                                <li>Deckx Johan</li>
                                <li>Bosdreef 7</li>
                                <li>2200 Herentals</li>
                            </ul>
                        </div>

                </div>
            </div>

        </div>
    </div>
@endsection