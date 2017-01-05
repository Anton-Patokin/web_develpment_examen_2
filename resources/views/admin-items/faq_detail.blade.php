@extends('layout.app')


@section('admin')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if(Session::has('success') )
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                <strong>Success!</strong> {{Session::has('success')}} successful.
                            </div>
                            {{session()->forget('success')}}
                        </div>
                    </div>
                @endif
                {!! Form::open(['url' => '/edit/faq/'.$faqs[0]->id.'/'.$faqs[1]->id]) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('title_nl','Nl question',array('class'=>'label-control'))}}
                            {{ Form::text('title_nl',$faqs[0]->question,array('class'=>'form-control','placeholder'=>'Your faq question'))}}
                            @if($errors->has('title_nl'))
                                <div class="alert alert-danger">
                                    <strong>Warning!</strong> {{$errors->first('title_nl')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('title_fr','Fr question',array('class'=>'label-control'))}}
                            {{ Form::text('title_fr',$faqs[1]->question,array('class'=>'form-control','placeholder'=>'Your faq question'))}}
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
                            {{ Form::label('answer','nl answer',array('class'=>'label-control'))}}
                            {{Form::textarea('answer', $faqs[0]->answer,array('class'=>'form-control','size' => '3x4'))}}
                            @if($errors->has('answer'))
                                <div class="alert alert-danger">
                                    <strong>Warning!</strong> {{$errors->first('answer')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('answer','fr answer',array('class'=>'label-control'))}}
                            {{Form::textarea('answer', $faqs[1]->answer,array('class'=>'form-control','size' => '3x4'))}}
                            @if($errors->has('answer'))
                                <div class="alert alert-danger">
                                    <strong>Warning!</strong> {{$errors->first('answer')}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('show_in', 'Position',array('class'=>'label-control'))}}
                            <select id="show_in" name="show_in" class="form-control">
                                <optgroup label="About us">
                                    <option value="about_us" selected>About us</option>
                                </optgroup>

                                <optgroup label="Products">
                                    @foreach($items as $item)
                                        <option value="{{$item->item_id}}"
                                        @if($faqs[0]->item_id==$item->item_id && $faqs[0]->about_us == '0')
                                            {{'selected'}}
                                                @endif
                                        >{{$item->title}}</option>
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
                        {{Form::submit('Edit',array('class'=>'btn btn-default'))}}
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection