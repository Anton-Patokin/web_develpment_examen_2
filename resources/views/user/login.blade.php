@extends('layout.app')


@section('admin')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-4">
                {{ Form::open(array('url' => 'users')) }}
                <h1>Login</h1>

                <!-- if there are login errors, show them here -->
                <p>
                    {{ $errors->first('email') }}
                    {{ $errors->first('password') }}
                </p>

                <p>
                    {{ Form::label('email', 'Email Address') }}
                    {{ Form::text('email', old('email'), array('placeholder' => 'awesome@awesome.com')) }}
                </p>

                <p>
                    {{ Form::label('password', 'Password') }}
                    {{ Form::password('password') }}
                </p>

                <p>{{ Form::submit('Submit!') }}</p>
                {{ Form::close() }}
            </div>
        </div>
    </div>


@endsection