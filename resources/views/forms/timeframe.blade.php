<div class="box-body">
    <div class="bootstrap-timepicker col-md-3">
        <div class="form-group {{ $errors->has('from') ? ' has-error' : '' }}">
            <label>From Time :</label>
            <div class="input-group">
            {!! Form::text('from', null, array('placeholder' => '','class' => 'form-control timepicker')) !!}
            <div class="input-group-addon">
                <i class="fa fa-clock-o"></i>
            </div>
        </div>
        </div>
    </div>
    
    <div class="bootstrap-timepicker col-md-3">
        <div class="form-group {{ $errors->has('to') ? ' has-error' : '' }}">
            <label>To Time :</label>
            <div class="input-group">
            {!! Form::text('to', null, array('placeholder' => '','class' => 'form-control timepicker')) !!}
            <div class="input-group-addon">
                <i class="fa fa-clock-o"></i>
            </div>
        </div>
        </div>
    </div>

    {{ csrf_field() }}
</div>

<div class="box-footer">
    <button type="submit" class="btn btn-primary">Save</button>
</div>