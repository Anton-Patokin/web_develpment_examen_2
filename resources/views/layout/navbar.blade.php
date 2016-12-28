@if( Auth::check())
    <ul class="nav nav-pills  user-navbar">
        <li class=""><a href="{{url('/logout')}}">Logout</a></li>
        <li class=""><a href="{{url('/users/products')}}">Products</a></li>
        <li class=""><a href="{{url('/')}}">Website</a></li>
    </ul>
@endif

<div id="sidebar-wrapper" class="choplin-font">
    <ul class="sidebar-nav menu">
        <li class="menu-toggle hamburger ie "><span></span></li>
        <li class="search"><a href="#">Search</a></li>
        <li class="faq"><a href="#">FAQ</a></li>
        @foreach($categories as $category)
            <li class="{{$category['category']->url}}"><a href="#">{{$category['translation']->text}}</a></li>
        @endforeach
    </ul>
    <ul class="logo">
        <li class="logo_k"><span href="#"></span></li>
    </ul>
</div>