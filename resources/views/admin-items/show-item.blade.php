@extends('layout.app')


@section('admin')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(Session::get('success'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                <strong>Success!</strong> {{Session::get('success')}} successful.
                            </div>
                            {{session()->forget('success')}}
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-md-offset-1">
                <h1>images</h1>
                <div class="row">
                    @foreach($item->fotos as $foto)
                        <div class="col-xs-6 col-md-3">
                            <img src="{{url('/images/items/small/'.$foto->url)}}" alt="...">
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
            </div>

            <hr>
            <div class="col-md-11 col-md-offset-1">
                <div class="row">
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
                            {{Form::submit('Edit product',array('class'=>'btn btn-default'))}}
                        </div>
                    </div>
                    {{ Form::close()}}




                    {{--Shapes --}}


                </div>
            </div>

            <hr>
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
                    <div class="col-md-6">
                        <h1>Color</h1>
                        <div class="row">
                            @foreach($item->colors as $color)
                                <div class="col-xs-6 col-md-1">
                                    <div class="color-circel color-{{$color->type}}"></div>
                                    <a href="{{url('/delete/color/product/'.$color->id.'/'.$item->id)}}"
                                       class="btn btn-danger">x</a>
                                </div>
                            @endforeach
                        </div>
                        {!! Form::open(['url' => '/add/color/product/'.$item->id]) !!}
                        <div class="form-group">
                            {{ Form::label('color','Selecter cleur',array('class'=>'label-control'))}}
                            <select id="color" name="color" class="form-control">
                                <option value="red">Rood</option>
                                {{--<option value="rectangle">Rectangle</option>--}}
                                <option value="green">Groen</option>
                                <option value="blue">Blouw</option>
                                <option value="black">Zwart</option>
                                <option value="white">Wit</option>
                            </select>
                            @if($errors->has('color'))
                                <div class="alert alert-danger">
                                    <strong>Warning!</strong> {{$errors->first('color')}}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-1">
                            {{Form::submit('Add color',array('class'=>'btn btn-default'))}}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <hr>
            <div class='col-md-offset-1'>
                <div class="row">
                    <div class="col-md-6">
                        <h1>Dimensions</h1>
                        <div class="row">
                            @foreach($item->dimensions as $dimension)
                                <div class="col-xs-6 col-md-6">
                                    <p>{{$dimension->type.'-> h:'.$dimension->height.'-> w:'.$dimension->width}}</p>
                                    <a href="{{url('/delete/dimensions/product/'.$shape->id.'/'.$item->id)}}"
                                       class="btn btn-danger">x</a>
                                </div>
                            @endforeach
                        </div>

                        {!! Form::open(['url' => '/add/dimensions/product/'.$item->id]) !!}
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('dimensions','Selecter Dimensions',array('class'=>'label-control'))}}
                                <select id="dimensions" name="dimensions" class="form-control">
                                    <option value="s">Small -> s</option>
                                    {{--<option value="rectangle">Rectangle</option>--}}
                                    <option value="m">Medium -> m</option>
                                    <option value="l">Large -> l</option>
                                    <option value="xl">Extra Large -> xl</option>
                                </select>
                                @if($errors->has('dimensions'))
                                    <div class="alert alert-danger">
                                        <strong>Warning!</strong> {{$errors->first('dimensions')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('height','Height',array('class'=>'label-control'))}}
                                {{ Form::text('height',old('height'),array('class'=>'form-control'))}}
                                @if($errors->has('height'))
                                    <div class="alert alert-danger">
                                        <strong>Warning!</strong> {{$errors->first('height')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('width','Width',array('class'=>'label-control'))}}
                                {{ Form::text('width',old('width'),array('class'=>'form-control'))}}
                                @if($errors->has('width'))
                                    <div class="alert alert-danger">
                                        <strong>Warning!</strong> {{$errors->first('width')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-1">
                            {{Form::submit('Add dimensions',array('class'=>'btn btn-default'))}}
                        </div>

                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-6">
                        <h1>Tags</h1>
                        <div class="row">
                            @foreach($item->tags as $tag)
                                <div class="col-xs-6 col-md-4">
                                    <p>{{$tag->tag}}</p>
                                    <a href="{{url('/delete/tag/product/'.$tag->id.'/'.$item->id)}}"
                                       class="btn btn-danger">x</a>
                                </div>
                            @endforeach
                        </div>
                        {!! Form::open(['url' => '/add/tag/product/'.$item->id]) !!}
                        <div class="form-group">
                            {{ Form::label('tag','Add tag',array('class'=>'label-control'))}}
                            {{ Form::text('tag',old('tag'),array('class'=>'form-control'))}}
                            @if($errors->has('tag'))
                                <div class="alert alert-danger">
                                    <strong>Warning!</strong> {{$errors->first('tag')}}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-1">
                            {{Form::submit('Add tag',array('class'=>'btn btn-default'))}}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <hr>

            <div class='col-md-offset-1'>
                <div class="row">

                    {!! Form::open(['url' => '/add/active/product/'.$item->id]) !!}
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::submit(($item->active)?'Deactiveren':'Activeren', ['class' => ($item->active)?'btn btn-danger ':'btn btn-success']) }}
                        </div>
                        {{ Form::close() }}
                    </div>

                    {{Form::open(['url' => '/products/'.$item->id,'method' => 'DELETE'])}}
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::submit('Delete product', ['class' => 'btn btn-danger pull-right']) }}
                        </div>
                    </div>
                    {{ Form::close() }}


                </div>
            </div>
        </div>
    </div>
    {{--"fotos": [],--}}
    {{--"tags": [],--}}
    {{--"dimensions": [],--}}
    {{--"shapes": []--}}
@endsection