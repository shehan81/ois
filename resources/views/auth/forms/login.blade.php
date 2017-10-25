<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">Username</label>
            <div class="col-md-6">
                {{ csrf_field() }}
                
                {!! Form::text('username', null, array('placeholder' => 'Username','class' => 'form-control')) !!}
                
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>
            <div class="col-md-6">
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('remember', '1', true) !!} Remember Me
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Login</button>
    </div>
</div>