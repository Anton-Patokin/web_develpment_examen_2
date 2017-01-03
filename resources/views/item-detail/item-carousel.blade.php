@foreach($item_pagination as $key=>$item_p)
    <div class="items">
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail-custom ">
                <a class="" href="{{url('/product/'.$items_extra[$item_p->id]['category'].'/'.$item_p->id)}}"><img
                            src="{{url('/images/items/small/'.$items_extra[$item_p->id]['foto'])}}"
                            alt=""></a>
                <p class="img-hover-text">messages.detail</p>
            </div>
        </div>
    </div>
@endforeach
