<!DOCTYPE html>
<html>
<head>
    <title>Kowloon</title>
    <link href="{{url('/css/app.css')}}" rel="stylesheet">
    @yield('header')

</head>
<body>

{{--<div id="wrapper" class="toggled">--}}
{{--<!-- Sidebar -->--}}
{{--@include('layout.navbar')--}}
{{--<div id="page-content-wrapper">--}}
{{--</div>--}}
{{--</div>--}}

{{--@yield('content')--}}


@if( !Request::is('login') && Auth::check() !='1')
    <div id="wrapper" class="toggled">
        <!-- Sidebar -->
        @include('layout.navbar')
        <div id="page-content-wrapper">
        </div>
    </div>
    @yield('content')
@endif
@if( Request::is('login') || Auth::check() !='1')

    @if( Auth::check())
        <ul class="nav nav-pills  user-navbar">

            <li class=""><a href="{{url('/logout')}}">Logout</a></li>
            <li class=""><a href="{{url('/users/products')}}">Products</a></li>
        </ul>
        <br>

        @else
        @yield('admin')
        @endif
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