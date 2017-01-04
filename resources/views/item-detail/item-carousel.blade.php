{{--@foreach($item_pagination as $key=>$item_p)--}}
{{--<div class="items">--}}
{{--<div class="col-sm-6 col-md-3">--}}
{{--<div class="thumbnail-custom ">--}}
{{--<a class="" href="{{url('/product/'.$items_extra[$item_p->id]['category'].'/'.$item_p->id)}}"><img--}}
{{--src="{{url('/images/items/small/'.$items_extra[$item_p->id]['foto'])}}"--}}
{{--alt=""></a>--}}
{{--<p class="img-hover-text">messages.detail</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endforeach--}}


<ul id="item-carousel">
    @foreach($item_pagination as $key=>$item_p)
        <li>
            <a class="img-background" href="{{url('/product/'.$items_extra[$item_p->id]['category'].'/'.$item_p->id)}}">
                <img class="image1" src="{{url('/images/items/small/'.$items_extra[$item_p->id]['foto'])}}">
                <img class="image2" src="{{url('/images/hover/overlay.png')}}" hidden/>
            </a>
        </li>
    @endforeach
    <div id="pagination-items">
        <div class="pagination-items-left"><span><img src="{{url('/images/hover/arrow-left.png')}}"></span></div>
        <div class="pagination-items-right"><span><img src="{{url('/images/hover/arrow-lrigth.png')}}"></span></div>
    </div>
</ul>



