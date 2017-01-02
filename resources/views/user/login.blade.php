@extends('layout.app')


@section('login')
    @if(!Auth::check())
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    {{ Form::open(array('url' => 'users')) }}
                    <h1>Login</h1>

                    <!-- if there are login errors, show them here -->

                    <div class="form-group">
                        {{ Form::label('email', 'Email Address',array('class'=>'label-control')) }}
                        {{ Form::text('email', old('email'), array('placeholder' => 'awesome@awesome.com','class'=>'form-control')) }}
                        @if($errors->has('email'))
                            <div class="alert alert-danger">
                                <strong>Warning!</strong> {{$errors->first('email')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        {{ Form::label('password', 'Password',array('class'=>'label-control')) }}
                        {{ Form::password('password', array('class'=>'form-control')) }}
                        @if($errors->has('password'))
                            <div class="alert alert-danger">
                                <strong>Warning!</strong> {{$errors->first('password')}}
                            </div>
                        @endif
                    </div>


                    {{ Form::submit('Submit!',array('class'=>'btn btn-default')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    @else
        <h1>you are logd in</h1>

    @endif



@endsection