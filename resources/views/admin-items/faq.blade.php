@extends('layout.app')


@section('admin')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['url' => '/add/faq']) !!}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('title_nl','Nl question',array('class'=>'label-control'))}}
                            {{ Form::text('title_nl',old('title_nl'),array('class'=>'form-control','placeholder'=>'Your faq question'))}}
                            @if($errors->has('title_nl'))
                                <div class="alert alert-danger">
                                    <strong>Warning!</strong> {{$errors->first('title_nl')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('title_fr','FR question',array('class'=>'label-control'))}}
                            {{ Form::text('title_fr',old('title_fr'),array('class'=>'form-control','placeholder'=>'Your faq question'))}}
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
                            {{ Form::label('answer_nl','Nl answer',array('class'=>'label-control'))}}
                            {{Form::textarea('answer_nl', old('answer_nl'),array('class'=>'form-control','size' => '3x4'))}}
                            @if($errors->has('answer_nl'))
                                <div class="alert alert-danger">
                                    <strong>Warning!</strong> {{$errors->first('answer_nl')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('answer_fr','FR answer',array('class'=>'label-control'))}}
                            {{Form::textarea('answer_fr', old('answer_fr'),array('class'=>'form-control','size' => '3x4'))}}
                            @if($errors->has('answer_fr'))
                                <div class="alert alert-danger">
                                    <strong>Warning!</strong> {{$errors->first('answer_fr')}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-1">
                        {{Form::submit('Add',array('class'=>'btn btn-default'))}}
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection