<!DOCTYPE html>
<html>
<head>
    <title>Kowloon</title>
    <link href="{{url('/css/app.css')}}" rel="stylesheet">
    @yield('header')

</head>
<body>

@if(Cookie::get('acceptCookie') != 'okey')
    <div class="cookie">
        <div class="container-fluid">
            <a><img class="exit-cookie pull-right" src="{{url('/images/cookie/exit.png')}}"></a>
        </div>
        <div class="container ">
            <div class="col-md-offset-1">
                <div class="col-md-2">
                    <img class="img-cookie" src="{{url('/images/cookie/cookies.png')}}">
                </div>
                <div class="col-md-9 col-md-offset-1 cookie-margin-top-text">
                    <h1>Cookies</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna Duis voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                    <button class="btn btn-cookie font-white"><a href="{{url('/set_cookie')}}">{{trans('messages.set_cookie')}}</a>
                    </button>
                </div>
                
            </div>
            
        </div>
    </div>
@else

@endif


{{--<div id="wrapper" class="toggled">--}}
{{--<!-- Sidebar -->--}}
{{--@include('layout.navbar')--}}
{{--<div id="page-content-wrapper">--}}
{{--</div>--}}
{{--</div>--}}

{{--@yield('content')--}}


@if( !Request::is('login'))
    <div id="wrapper" class="toggled">
        <!-- Sidebar -->
        @include('layout.navbar')
        <div id="page-content-wrapper">
        </div>
    </div>

    @yield('admin')
    @yield('content')
    @endif
    @if( Request::is('login'))
    @yield('login')
    @endif

            <!-- /#wrapper -->

    {{--<div id="wrapper toggled">--}}
    {{--@include('layout.navbar')--}}

    {{--<div id="page-content-wrapper">--}}

    {{--</div>--}}
    {{--</div>--}}

    <script src="{{url('/js/app.js')}}"></script>
</body>
</html>