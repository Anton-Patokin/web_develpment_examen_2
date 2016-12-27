<div class="container hot-items">
    <div class="row">
        <div class="col-md-11">
            <h1 class="choplin-font uppercase">
                {{trans('messages.hot-items')}}.
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-11">
            @foreach($items as $key=>$item)
                <div class="col-md-3">
                    <p>{{$item['item']->url}}</p>

                    <hr>
                    <p>{{$item['translation']->title}}</p>
                    <p>{{$item['item']->price}}</p>
                </div>

            @endforeach
        </div>
    </div>
</div>
