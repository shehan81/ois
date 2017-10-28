<div class="box-body">
    <div class="form-group col-md-3 {{ $errors->has('code') ? ' has-error' : '' }}">
        {{ csrf_field() }}
        <span class='text-danger'>*</span> <label for="code">Subject Code </label>
        {!! Form::text('code', null, array('placeholder' => 'Ex: BCCA','class' => 'form-control')) !!}
        <i class="help-block">- Length : 4 Digits. <br />- Code must be unique.</i>
    </div>
    
    <div class="form-group col-md-12 {{ $errors->has('title') ? ' has-error' : '' }}">
        <span class='text-danger'>*</span> <label for="title">Title</label>
        {!! Form::text('title', null, array('placeholder' => 'Ex: Mathematics I','class' => 'form-control')) !!}
    </div>
    
    <div class="form-group col-md-12 {{ $errors->has('status') ? ' has-error' : '' }}">
        <label for="status">Status</label>
        {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="box-footer">
    <button type="submit" class="btn btn-primary">Save</button>
</div>