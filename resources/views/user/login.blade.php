@extends('layout.app')


@section('login')
    @if(!Auth::check())
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    {{ Form::open(array('url' => 'users')) }}
                    <h1>Login</h1>

                    <!-- if there are login errors, show them here -->
                    <p>
                        {{ $errors->first('email') }}
                        {{ $errors->first('password') }}
                    </p>

                    <div class="form-group">
                        {{ Form::label('email', 'Email Address',array('class'=>'label-control')) }}
                        {{ Form::text('email', old('email'), array('placeholder' => 'awesome@awesome.com','class'=>'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('password', 'Password',array('class'=>'label-control')) }}
                        {{ Form::text('password', '', array('class'=>'form-control')) }}
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