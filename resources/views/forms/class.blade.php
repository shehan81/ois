<div class="box-body">
    <div class="row">
        <div class="form-group col-md-6 {{ $errors->has('day') ? ' has-error' : ''}}">
            {{ csrf_field()}}
            <span class='text-danger'>*</span> <label for="day">Day</label>
            <select name='day' ng-model='day' ng-change='getTimeFrames()' class='form-control'>
                <option value="">Select Class Schedule Day</option>
                <option ng-repeat='day in weekdays' value='<%day%>'><%day%></option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6 {{ $errors->has('timeframe') ? ' has-error' : ''}}">
            <span class='text-danger'>*</span> <label for="timeframe">Available Time Frame</label>
            <select name='timeframe_id' ng-model='timeframe_id' class='form-control' ng-change='getSubjects()' ng-disabled='!day'>
                <option value="">Select Timeframe </option>
                <option ng-repeat='(timeframe_id, time) in timeframes' value='<%timeframe_id%>'><%time%></option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6 {{ $errors->has('subject') ? ' has-error' : ''}}">
            <span class='text-danger'>*</span> <label for="day">Available Subjects</label>
            <select name='subject_id' ng-model='subject_id' class='form-control' ng-change='getInstructors()' ng-disabled='!timeframe_id'>
                <option value="">Select Subject </option>
                <option ng-repeat='(subject_id, subject) in subjects' value='<%subject_id%>'><%subject%></option>
            </select>
        </div>
        
        <div class="form-group col-md-6">
            <div class="form-group"></div>
            {!! Form::checkbox('exclude', 1, true, ['ng-click' => 'getSubjects()', 'ng-model' => 'exclude', 'ng-disabled' => '!timeframe_id']) !!}
            <label for="day"> Exclude the subjects already scheduled for the day</label>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-md-6 {{ $errors->has('instructor') ? ' has-error' : ''}}">
            <span class='text-danger'>*</span> <label for="day">Available Instructors</label>
            <select name='instructor_id' ng-model='instructor_id' class='form-control' ng-disabled='!subject_id'>
                <option value="">Select Instructor </option>
                <option ng-repeat='(instructor_id, instructor) in instructors' value='<%instructor_id%>'><%instructor%></option>
            </select>

        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-md-6 {{ $errors->has('status') ? ' has-error' : '' }}">
            <label for="status">Status</label>
            {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control', 'ng-disabled' => '!instructor_id']) !!}
        </div>
    </div>
    
</div>

<div class="box-footer">
    <button type="submit" class="btn btn-primary">Save</button>
</div>