@if( Auth::check())
@include('admin-items.admin_navbar')
@endif

<div id="sidebar-wrapper" class="choplin-font">
    <ul class="sidebar-nav menu">
        <li class="menu-toggle hamburger ie "><span></span></li>
        <li class="search"><a id="search" class="font-gray white-background-click" href="">Search</a></li>
        <li  class="faq"><a id="faq" class="font-gray white-background-click" href="">FAQ</a></li>
        <hr class="nav-devider nav-hide">
        <li class="email nav-email-style nav-hide {{(Request::is('*/about-us')?'active':'')}}"><a class="font-gray "
                                                                                              href="{{url('/about-us')}}">Contact</a></li>
        <hr class="nav-devider">
        @foreach($categories as $category)
            <li class=" {{$category['category']->url}} @if(Request::is('*/'.$category['category']->url))
            {{'active'}}
            @else
            @if(Request::is('*/'.$category['category']->url.'/*'))
            {{'active'}}
            @endif
            @endif"><a class="font-white"
                       href="{{url('/product/'.$category['category']->url)}}">{{$category['translation']->text}}</a>
            </li>
        @endforeach
    </ul>
    <ul class="logo">
        <li class="logo_k"><span href="#"></span></li>
    </ul>
</div>