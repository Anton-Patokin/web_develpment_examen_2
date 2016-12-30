<div class="container hot-items">
    <div class="row">
        <div class="col-md-11">
            <h1 class="choplin-font uppercase">
                {{trans('messages.hot-items')}}.
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="row">
                @foreach($items as $key=>$item)
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="{{url('/images/items/'.$item['url'])}}" alt="{{$item['title']}}">
                            <div class="caption">
                                <p>{{$item['title']}}</p>
                                <p>{{$item['price']}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
