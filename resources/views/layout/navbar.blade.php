<div id="sidebar-wrapper">
    <ul class="sidebar-nav menu">
        <li class="menu-toggle hamburger ie "><span></span></li>
        <li class="search"><a href="#">Search</a></li>
        <li class="faq"><a href="#">FAQ</a></li>
@foreach($categories as $category)
            <li class="{{$category->url}}"><a href="#">{{$category->type_nl}}</a></li>
@endforeach


        {{--<li class="search"><a href="#">Search</a></li>--}}
        {{--<li class="faq"><a href="#">FAQ</a></li>--}}
        {{--<hr class="nav-devider">--}}
        {{--<li class="dogs"><a href="#">Dogs</a></li>--}}
        {{--<li class="cats"><a href="#">Cats</a></li>--}}
        {{--<li class="fish"><a href="#">fish</a></li>--}}
        {{--<li class="birds"><a href="#">Birds</a></li>--}}
        {{--<li class="small_animals"><a href="#">Small animals</a></li>--}}
    </ul>
    <ul class="logo">
        <li class="logo_k"><span href="#"></span></li>
    </ul>
</div>