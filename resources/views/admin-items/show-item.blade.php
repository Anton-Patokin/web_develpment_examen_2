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
                                <a href="{{url('/delete/foto/product/'.$foto->id.'/'.$item->id)}}"
                                   class="btn btn-danger">delete</a>
                            </div>
                        @endforeach

                        {!! Form::open(['url' => '/add/foto/product/'.$item->id, 'files' => true]) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('url','Selecter image',array('class'=>'label-control'))}}
                                    {{ Form::file('url',array('class'=>'form-control'))}}
                                    @if($errors->has('url'))
                                        <div class="alert alert-danger">
                                            <strong>Warning!</strong> {{$errors->first('url')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-1">
                                {{Form::submit('Add',array('class'=>'btn btn-default'))}}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>



                    <h1>Tilte</h1>
                    <div class="row">

                        {!! Form::open(['url' => '/update/title/product/'.$item->id]) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('title_fr','Titel-fr',array('class'=>'label-control'))}}
                                        {{ Form::text('id_fr',$item->translations[0]->id,array('hidden'=>'hidden'))}}
                                        {{ Form::text('title_fr',$item->translations[0]->title,array('class'=>'form-control'))}}
                                        @if($errors->has('title_fr'))
                                            <div class="alert alert-danger">
                                                <strong>Warning!</strong> {{$errors->first('title_fr')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('title_nl','Titel-fr',array('class'=>'label-control'))}}

                                        {{ Form::text('id_nl',$item->translations[1]->id,array('hidden'=>'true'))}}
                                        {{ Form::text('title_nl',$item->translations[1]->title,array('class'=>'form-control'))}}
                                        @if($errors->has('title_nl'))
                                            <div class="alert alert-danger">
                                                <strong>Warning!</strong> {{$errors->first('title_nl')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-1">
                                {{Form::submit('Edit',array('class'=>'btn btn-default'))}}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>


                    <h1>Description</h1>
                    <div class="row">

                        {!! Form::open(['url' => '/update/title/product/'.$item->id]) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('title_fr','Titel-fr',array('class'=>'label-control'))}}
                                        {{ Form::texterea('id_fr',$item->translations[0]->id,array('hidden'=>'hidden'))}}
                                        {{ Form::text('title_fr',$item->translations[0]->title,array('class'=>'form-control'))}}
                                        @if($errors->has('title_fr'))
                                            <div class="alert alert-danger">
                                                <strong>Warning!</strong> {{$errors->first('title_fr')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('title_nl','Titel-fr',array('class'=>'label-control'))}}

                                        {{ Form::text('id_nl',$item->translations[1]->id,array('hidden'=>'true'))}}
                                        {{ Form::text('title_nl',$item->translations[1]->title,array('class'=>'form-control'))}}
                                        @if($errors->has('title_nl'))
                                            <div class="alert alert-danger">
                                                <strong>Warning!</strong> {{$errors->first('title_nl')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-1">
                                {{Form::submit('Edit',array('class'=>'btn btn-default'))}}
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