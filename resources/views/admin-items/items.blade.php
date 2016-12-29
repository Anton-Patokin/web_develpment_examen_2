@extends('layout.app')


@section('admin')
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                @foreach ($items as $key=>$item)
                    <div class="col-sm-4 col-md-3">
                        <div class="thumbnail">
                            <img src="{{url('/images/items/'.($items_extra[$item->id]['foto']?$items_extra[$item->id]['foto']->url:'default.png'))}}" alt="...">
                            <div class="caption">
                                @if($items_extra[$item->id]['translation'])
                                    <h3>{{$items_extra[$item->id]['translation']->title}}</h3>
                                @endif
                                <p>{{$item->price}}</p>
                                <p>
                                    @if($items_extra[$item->id]['foto'])
                                        <a href="#" class="btn btn-primary" role="button">Edit</a>
                                    @else
                                        <a href="#" class="btn btn-primary" role="button">Complete </a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{--//dropdown--}}
                {{--<select id="size"  name="size" class="form-control">--}}
                {{--@foreach ($sizes as $s)--}}
                {{--@if ($s->value == $currentSize)--}}
                {{--<option selected value="{{ $s->value }}">{{ $s->name }}</option>--}}
                {{--@else--}}
                {{--<option value="{{ $s->value }}">{{ $s->name }}</option>--}}
                {{--@endif--}}
                {{--@endforeach--}}
                {{--</select>--}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <div class="row">
                    <div class="col-md-11 col-md-offset-1">
                        {{ $items->links() }}
                    </div>
                </div>
                @include('admin-items.form-add-item')
            </div>
        </div>

    </div>
@endsection