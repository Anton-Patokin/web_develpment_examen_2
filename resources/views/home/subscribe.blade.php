<div class="container subscribe">
    <div class="row">
        <div class="col-md-12">

            <div class="col-md-7 section-banner">
                <h1 class="choplin-font font-white">{{trans('messages.banner')}}</h1>
                <h3 class="choplin-font font-white">{{trans('messages.newsletter')}}</h3>
            </div>
            <div class="col-md-5 section-subscribe">
                <div class="col-md-11">
                    <h3 class="font-white">{{trans('messages.subscribe')}}</h3>
                    <h4 class="font-grey">{{trans('messages.lorum')}}</h4>
                    {!! Form::open(['url' => '/subscribe']) !!}

                    <div class="input-group">
                        <input type="text" name="email" class="font-gray form-control " placeholder="Domain@emeil.com">
                              <span class="input-group-btn">
                                <button type="submit" class="btn btn-default" type="button">ok</button>
                              </span>
                    </div><!-- /input-group -->
                    @if($errors->has('email'))
                        <div class="alert alert-danger">
                            <strong>Warning!</strong> {{$errors->first('email')}}
                        </div>
                    @endif
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
