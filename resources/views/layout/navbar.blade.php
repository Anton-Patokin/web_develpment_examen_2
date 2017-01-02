@if( Auth::check())
    <div class="container">
        <div class="col-md-offset-1">
            <nav class="navbar navbar-default navbar-fixed-top">
                <ul class="nav navbar-nav">
                    <li class=""><a href="{{url('/logout')}}">Logout</a></li>
                    <li class=""><a href="{{url('/products')}}">Products</a></li>
                    <li class=""><a href="{{url('/')}}">Website</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <br>
    <br>
@endif

<div id="sidebar-wrapper" class="choplin-font">
    <ul class="sidebar-nav menu">
        <li class="menu-toggle hamburger ie "><span></span></li>
        <li class="search"><a class="font-gray" href="">Search</a></li>
        <li class="faq"><a class="font-gray" href="">FAQ</a></li>
        <hr class="nav-devider">
        @foreach($categories as $category)
            <li class=" {{$category['category']->url}} @if(Request::is('*/'.$category['category']->url))
            {{'active'}}
            @else
            @if(Request::is('*/'.$category['category']->url.'/*'))
            {{'active'}}
            @endif
            @endif"><a class="font-white" href="{{url('/product/'.$category['category']->url)}}">{{$category['translation']->text}}</a></li>
        @endforeach
    </ul>
    <ul class="logo">
        <li class="logo_k"><span href="#"></span></li>
    </ul>
</div>