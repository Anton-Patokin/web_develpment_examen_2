{{Form::open(['url' => '/products'])}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{Form::label('title_nl', 'Naam-nl',array('class'=>'label-control'))}}
            {{Form::text('title_nl', old('title_nl'),array('class'=>'form-control'))}}
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
            {{Form::text('title_fr', old('title_fr'),array('class'=>'form-control'))}}
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
            {{Form::textarea('description_nl', old('description_nl'),array('class'=>'form-control','size' => '3x4'))}}
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
            {{Form::textarea('description_fr', old('description_fr'),array('class'=>'form-control','size' => '3x4'))}}
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
            {{Form::text('price', old('price'),array('placeholder' => '1254.12','class'=>'form-control'))}}
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

                @for($i=1;$i<count($items)+10;$i++)
                    <option value="{{ $i}}">{{ $i}}</option>
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
                    <option value="{{ $collection->type}}">{{trans('collection.'.$collection->type)}}</option>
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
                    <option value="{{ $category['category']->url}}">{{ $category['translation']->text}}</option>
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
            {{Form::textarea('specification_nl', old('specification_nl'),array('class'=>'form-control','size' => '3x4'))}}
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
            {{Form::textarea('specification_fr', old('specification_fr'),array('class'=>'form-control','size' => '3x4'))}}
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