<!DOCTYPE html>
<html>
<head>
    <title>Kowloon</title>
    <link href="{{url('/css/app.css')}}" rel="stylesheet">
    @yield('header')

</head>
<body>

@if(Cookie::get('2') != 'okey')
    <div class="cookie">
        <div class="container">
            <h1>set cookie</h1>
            <button class="btn btn-cookie font-white"><a href="{{url('/set_cookie')}}">{{trans('messages.set_cookie')}}</a>
            </button>
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