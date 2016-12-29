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


                    <h1>Algemeen</h1>
                    {!! Form::open(['url' => '/update/product/'.$item->id]) !!}
                    {{ Form::text('id_nl',$item->translations[1]->id,array('hidden'=>'hidden'))}}
                    {{ Form::text('id_fr',$item->translations[0]->id,array('hidden'=>'hidden'))}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('title_nl', 'Naam-nl',array('class'=>'label-control'))}}
                                {{Form::text('title_nl', $item->translations[1]->title,array('class'=>'form-control'))}}
                                @if($errors->has('title_nl'))
                                    <div class="alert alert-danger">
                                        <strong>Warning!</strong> {{$errors->first('title_nl')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('title_fr', 'Naam-fr',array('class'=>'label-control'))}}
                                {{Form::text('title_fr', $item->translations[0]->title,array('class'=>'form-control'))}}
                                @if($errors->has('title_fr'))
                                    <div class="alert alert-danger">
                                        <strong>Warning!</strong> {{$errors->first('title_fr')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('description_nl', 'Beschrijving-nl',array('class'=>'label-control'))}}
                                {{Form::textarea('description_nl', $item->translations[1]->description,array('class'=>'form-control','size' => '3x4'))}}
                                @if($errors->has('description_nl'))
                                    <div class="alert alert-danger">
                                        <strong>Warning!</strong> {{$errors->first('description_nl')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('description_fr', 'Beschrijving-fr',array('class'=>'label-control'))}}
                                {{Form::textarea('description_fr', $item->translations[0]->description,array('class'=>'form-control','size' => '3x4'))}}
                                @if($errors->has('description_fr'))
                                    <div class="alert alert-danger">
                                        <strong>Warning!</strong> {{$errors->first('description_fr')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('price', 'Price',array('class'=>'label-control'))}}
                                {{Form::text('price', $item->price,array('placeholder' => '1254.12','class'=>'form-control'))}}
                                @if($errors->has('price'))
                                    <div class="alert alert-danger">
                                        <strong>Warning!</strong> {{$errors->first('price')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('position', 'Position',array('class'=>'label-control'))}}
                                <select id="position" name="position" class="form-control">
                                    @for($i=1;$i<count($item->position)+10;$i++)
                                        <option value="{{ $i}}" {{($item->position == $i)?'selected':''}}>{{ $i}}</option>
                                    @endfor
                                </select>
                                @if($errors->has('position'))
                                    <div class="alert alert-danger">
                                        <strong>Warning!</strong> {{$errors->first('position')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('collection', 'Select collection',array('class'=>'label-control'))}}
                                <select id="collection" name="collection" class="form-control">


                                    @foreach($collections as $collection)
                                        <option value="{{ $collection->type}}" {{($item->collection == $collection->type)?'selected':''}}>{{trans('collection.'.$collection->type)}}</option>
                                    @endforeach
                                </select>

                                @if($errors->has('collection'))
                                    <div class="alert alert-danger">
                                        <strong>Warning!</strong> {{$errors->first('collection')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('Category', 'Selecteer categorie',array('class'=>'label-control'))}}

                                <select id="category" name="category" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category['category']->url}}" {{($item->category_id == $category['category']->id)?'selected':''}}>{{ $category['translation']->text}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category'))
                                    <div class="alert alert-danger">
                                        <strong>Warning!</strong> {{$errors->first('category')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('specification_nl', 'Specification-nl',array('class'=>'label-control'))}}
                                {{Form::textarea('specification_nl', $item->translations[1]->specification,array('class'=>'form-control','size' => '3x4'))}}
                                @if($errors->has('specification_nl'))
                                    <div class="alert alert-danger">
                                        <strong>Warning!</strong> {{$errors->first('specification_nl')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('specification_fr', 'Specification-fr',array('class'=>'label-control'))}}
                                {{Form::textarea('specification_fr', $item->translations[0]->specification,array('class'=>'form-control','size' => '3x4'))}}
                                @if($errors->has('specification_fr'))
                                    <div class="alert alert-danger">
                                        <strong>Warning!</strong> {{$errors->first('specification_fr')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {{Form::submit('Add product')}}
                        </div>
                    </div>
                    {{ Form::close()}}




                    {{--Shapes --}}


                </div>


            </div>


            <div class='col-md-offset-1'>
                <div class="row">
                    <div class="col-md-6">
                        <h1>vormen</h1>
                        <div class="row">
                            @foreach($item->shapes as $shape)
                                <div class="col-xs-6 col-md-1">
                                    <img src="{{url('/images/shapes/'.$shape->shape.'.png')}}" alt="...">
                                    <a href="{{url('/delete/shape/product/'.$shape->id.'/'.$item->id)}}"
                                       class="btn btn-danger">x</a>
                                </div>
                            @endforeach
                        </div>
                        {!! Form::open(['url' => '/add/shape/product/'.$item->id]) !!}
                        <div class="form-group">
                            {{ Form::label('shape','Selecter Vorm',array('class'=>'label-control'))}}
                            <select id="shape" name="shape" class="form-control">
                                <option value="square">Square</option>
                                {{--<option value="rectangle">Rectangle</option>--}}
                                <option value="circle">Circle</option>
                                <option value="triangle">Triangle</option>
                            </select>
                            @if($errors->has('shape'))
                                <div class="alert alert-danger">
                                    <strong>Warning!</strong> {{$errors->first('shape')}}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-1">
                            {{Form::submit('Add shape',array('class'=>'btn btn-default'))}}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class='col-md-offset-1'>
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