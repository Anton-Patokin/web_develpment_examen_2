@extends('layout.app')


@section('admin')
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <div class="row">
                    <h1>images</h1>
                    <div class="row">
                        @foreach($item->fotos as $foto)
                            <div class="col-xs-6 col-md-3">
                                <img src="{{url('/images/items/'.$foto->url)}}" alt="...">
                                <button class="btn btn-danger">delete</button>
                            </div>
                        @endforeach

                        {!! Form::open(['url' => '/add/foto/product/'.$item->id, 'files' => true]) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('image','Selecter image',array('class'=>'label-control'))}}
                                    {{ Form::file('image',array('class'=>'form-control'))}}
                                </div>
                            </div>
                            <div class="col-md-1">
                                {{Form::submit('Add',array('class'=>'btn btn-default'))}}
                            </div>
                        </div>

                        {!! Form::close() !!}


                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {{Form::open(['url' => '/products/'.$item->id,'method' => 'DELETE'])}}
                        <div class="form-group">
                            {{ Form::submit('Delete product', ['class' => 'btn btn-danger pull-right']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--"fotos": [],--}}
    {{--"tags": [],--}}
    {{--"dimensions": [],--}}
    {{--"shapes": []--}}
@endsection