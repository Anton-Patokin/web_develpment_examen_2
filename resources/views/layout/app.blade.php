<!DOCTYPE html>
<html>
<head>
    <title>Kowloon</title>
    <link href="{{url('/css/app.css')}}" rel="stylesheet">
    @yield('header')

</head>
<body>

@if(!Cookie::has('acceptCookie'))
    <h1>set cookie</h1>
    <button class="btn btn-cookie"><a href="{{url('/set_cookie')}}">{{trans('messages.set_cookie')}}</a></button>
@else
    <h1>cookies zijn geacepteerd</h1>
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