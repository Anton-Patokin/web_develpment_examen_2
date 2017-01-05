@extends('layout.app')


@section('admin')
    <div class="container">
        <div class="row">

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

                @if(Session::get('success')=="add")
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                <strong>Success!</strong> Add successful.
                            </div>
                            {{session()->forget('success')}}
                        </div>
                    </div>
                @endif

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
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('show_in', 'Position',array('class'=>'label-control'))}}
                            <select id="show_in" name="show_in" class="form-control">
                                <optgroup label="About us">
                                    <option value="about_us" selected>About us</option>
                                </optgroup>

                                <optgroup label="Products">
                                    @foreach($items as $item)
                                        <option value="{{$item->item_id}}" {{(old('show_in')==$item->item_id?'selected':'')}}>{{$item->title}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            @if($errors->has('show_in'))
                                <div class="alert alert-danger">
                                    <strong>Warning!</strong> {{$errors->first('show_in')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-1">
                        {{Form::submit('Add',array('class'=>'btn btn-default'))}}
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>

        <div class="row">

            <hr>
            @foreach($faqs as $key=>$faq)

                <div class="col-md-6 faq-container">
                    <h3>{{$faq->question}}</h3>
                    <p class="col-md-12">{{$faq->answer}}</p>

                    <a href="{{url('/get/faq/'.($faq->about_us != ''?'about_us':'item').
                                            '/'.($faq->about_us != ''?$faq->about_us:$faq->item_id))}}">
                        <button class="btn btn-default col-md-6">
                            edit
                        </button>
                    </a>
                    <a href="{{url('/delete/faq/'.($faq->about_us != ''?'about_us':'item').
                                            '/'.($faq->about_us != ''?$faq->about_us:$faq->item_id))}}">
                        <button class="btn btn-default col-md-6">
                            delete
                        </button>
                    </a>

                </div>

            @endforeach

        </div>
    </div>
@endsection