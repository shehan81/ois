<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <div class="col-md-12">
                {{ csrf_field() }}

                <div class="form-group has-feedback">
                    {!! Form::text('username', null, array('placeholder' => 'Username','class' => 'form-control')) !!}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

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
            <div class="col-md-12">
                <div class="form-group has-feedback">
                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
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

    <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
    </div>
</div>