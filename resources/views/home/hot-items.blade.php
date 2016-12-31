<div class="container hot-items">
    <div class="row">
        <div class="col-md-11">
            <h1 class="choplin-font uppercase">
                {{trans('messages.hot-items')}}.
            </h1>
        </div>
    </div>
    <div class="row">


                @foreach($items as $key=>$item)
                    <div class="items">
                        <div class="col-sm-6 col-md-3">
                            <div class="thumbnail-custom {{($key==3)?'thumbnail-small':''}}">
                                <a class="" href=""><img src="{{url('/images/items/small/'.$item['url'])}}"
                                                         alt="{{$item['title']}}"></a>
                                <p class="img-hover-text">{{($key!=3)?trans('messages.detail'):trans('messages.more')}}</p>
                                <ul class="colors">
                                    @if(count($item['color'])< 3)
                                        @foreach($item['color'] as $color)
                                            <li class="color-circel color-{{$color->type}}"></li>
                                        @endforeach
                                    @else
                                        <li class="color-four"><span>{{count($item['color'])}}</span></li>
                                    @endif
                                </ul>

                                <div class="caption">
                                    <p class="choplin-font">{{$item['title']}} <span class="choplin-font pull-right">&#8364; {{$item['price']}}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


    </div>
</div>
