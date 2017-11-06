<div class="box-body">
    <div class="form-group col-md-12 {{ $errors->has('first_name') ? ' has-error' : '' }}">
        {{ csrf_field() }}
        <span class='text-danger'>*</span> <label for="first_name">First Name</label>
        {!! Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}
    </div>
    
    <div class="form-group col-md-12 {{ $errors->has('last_name') ? ' has-error' : '' }}">
        <span class='text-danger'>*</span> <label for="first_name">Last Name</label>
        {!! Form::text('last_name', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
    </div>
    
    <div class="form-group col-md-12 {{ $errors->has('email') ? ' has-error' : '' }}">
        <span class='text-danger'>*</span> <label for="email">E-mail</label>
        {!! Form::email('email', null, array('placeholder' => 'Ex: user@email.com','class' => 'form-control')) !!}
        <p class="help-block">Email must be unique</p>
    </div>
    
    <div class="form-group col-md-12">
        <span class='text-danger'>*</span> <label for="email">Subject(s)</label>
        
        <div class="form-group">
            {!! Form::select('subjects[]', $subjects, null, array('multiple', 'style' => 'height:140px')) !!}
        </div>
        
    </div>
    
    <div class="form-group col-md-12 {{ $errors->has('status') ? ' has-error' : '' }}">
        <label for="status">Status</label>
        {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control']) !!}
    </div>
    
    
</div>

<div class="box-footer">
    <button type="submit" class="btn btn-primary">Save</button>
</div>