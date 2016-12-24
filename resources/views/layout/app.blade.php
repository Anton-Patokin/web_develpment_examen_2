<!DOCTYPE html>
<html>
<head>
    <title>Kowloon</title>
    <link href="{{url('/css/app.css')}}" rel="stylesheet">
    @yield('header')

</head>
<body>

    <div id="wrapper" class="toggled">
        <!-- Sidebar -->
        @include('layout.navbar')
        {{--<div id="page-content-wrapper">--}}
        {{--</div>--}}
    </div>

    @yield('content')



    <!-- /#wrapper -->

    {{--<div id="wrapper toggled">--}}
    {{--@include('layout.navbar')--}}

    {{--<div id="page-content-wrapper">--}}

    {{--</div>--}}
    {{--</div>--}}

<script src="{{url('/js/app.js')}}"></script>
</body>
</html>