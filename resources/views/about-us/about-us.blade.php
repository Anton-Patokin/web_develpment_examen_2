@extends('layout.app')
@section('header')
    <title>About us-Contact us-Kowloon</title>
@endsection

@section('content')
    @include('logo-top')
    <div class="container-fluid">
        <img class="about-us-img" src="{{url('/images/backgrounds/about_us.png')}}">
    </div>
    <div class="container">
        <div class="row about-us-img-margin-top">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="margin-left-tags">
                            <ul id="breadcrumbs-three">
                                <li><a href="" class="current"><img src="{{url('/images/logo_char.png')}}"></a></li>
                                <li><a href="{{url('/about-us')}}">about us</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="font-white about-us-content">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="choplin-font uppercase">About us</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="about_us_bundel_1">
                                <div class="col-md-8">
                                    <h3 class="choplin-font uppercase">
                                        Kowloon
                                    </h3>
                                    <p>Pet Concept, active since 1998, is developing, importing and exporting products
                                        for
                                        pets
                                        worldwide.</p>
                                    <br>
                                    <p> natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
                                        eaque
                                        ipsa
                                        quae ab illo inventore veritatis et quasi architecto beatae vitae sequi
                                        nesciunt.</p>
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
                <div class="row font-white contact-us-margin-top">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="choplin-font uppercase">
                                Leave us a message
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        {!! Form::open(['url' => '/about_us']) !!}
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{Form::label('email','E-mail',array('class'=>'label-control'))}}
                                        {{Form::text('email',old('email'),array('class'=>'form-control','placeholder'=>'name@domain.com'))}}
                                        @if($errors->has('email'))
                                            <div class="alert alert-danger">
                                                <strong>Warning!</strong> {{$errors->first('email')}}
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        {{Form::label('message_send','Your message',array('class'=>'label-control'))}}
                                        {{Form::textarea('message_send',old('content'),array('class'=>'form-control','size' => '3x4','placeholder'=>'Write your message here.'))}}
                                        @if($errors->has('message_send'))
                                            <div class="alert alert-danger">
                                                <strong>Warning!</strong> {{$errors->first('message_send')}}
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 btn-margin">
                                    <button type="submit" class="btn btn-pink font-white col-md-2">
                                        Send
                                    </button>
                                </div>

                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>


                </div>


            </div>

                @include('faq.acoordion')


        </div>
    </div>
@endsection