<div class="box-body">
    <div class="row">
        <div class="form-group col-md-6 {{ $errors->has('day') ? ' has-error' : ''}}">
            {{ csrf_field()}}
            <span class='text-danger'>*</span> <label for="day">Day</label>
            @if($method == 'create')
            <select name='day' ng-model='schedule.day' ng-change='getTimeFrames()' class='form-control'>
                <option value="">Select Class Schedule Day</option>
                <option ng-repeat='day in weekdays' value='<%day%>'><%day%></option>
            </select>
            @else
             {{ Form::select('day', array($class->day => $class->day), null, ['class' => 'form-control', 'readonly' => 'true']) }}
            @endif
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6 {{ $errors->has('timeframe') ? ' has-error' : ''}}">
            <span class='text-danger'>*</span> <label for="timeframe">Available Time Frame</label>
            @if($method == 'create')
            <select name='timeframe_id' ng-model='schedule.timeframe_id' class='form-control' ng-change='getSubjects()' ng-disabled='!schedule.day'>
                <option value="">Select Timeframe </option>
                <option ng-repeat='(timeframe_id, time) in timeframes' value='<%timeframe_id%>'><%time%></option>
            </select>
            @else
             {{ Form::select('timeframe_id', array($class->timeframe_id => $class->timeframe->time_frame), null, ['class' => 'form-control', 'readonly' => 'true']) }}
            @endif
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6 {{ $errors->has('subject') ? ' has-error' : ''}}">
            <span class='text-danger'>*</span> <label for="day">Available Subjects</label>
            @if($method == 'create')
            <select name='subject_id' ng-model='schedule.subject_id' class='form-control' ng-change='getInstructors()' ng-disabled='!schedule.timeframe_id'>
                <option value="">Select Subject </option>
                <option ng-repeat='(subject_id, subject) in subjects' value='<%subject_id%>'><%subject%></option>
            </select>
            @else
             {{ Form::select('subject_id', array($class->subject_id => $class->subject->title), null, ['class' => 'form-control', 'readonly' => 'true']) }}
            @endif
        </div>
        
        <div class="form-group col-md-6">
             @if($method == 'create')
            <div class="form-group"></div>
            {!! Form::checkbox('exclude', 1, true, ['ng-click' => 'getSubjects()', 'ng-model' => 'schedule.exclude', 'ng-disabled' => '!schedule.timeframe_id']) !!}
            <label for="day"> Exclude the subjects already scheduled for the day</label>
            @endif
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-md-6 {{ $errors->has('instructor') ? ' has-error' : ''}}">
            <span class='text-danger'>*</span> <label for="day">Available Instructors</label>
            @if($method == 'create')
            <select name='instructor_id' ng-model='schedule.instructor_id' class='form-control' ng-disabled='!schedule.subject_id'>
                <option value="">Select Instructor </option>
                <option ng-repeat='(instructor_id, instructor) in instructors' value='<%instructor_id%>'><%instructor%></option>
            </select>
            @else
             {{ Form::select('instructor_id', array($class->instructor_id => $class->instructor->full_name), null, ['class' => 'form-control', 'readonly' => 'true']) }}
            @endif
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-md-6 {{ $errors->has('status') ? ' has-error' : '' }}">
            <label for="status">Status</label>
            @if($method == 'create')
             {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control', 'ng-disabled' => '!schedule.instructor_id']) !!}
            @else
             {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control']) !!}
            @endif
        </div>
    </div>
    @if($method != 'create')
        {!! Form::hidden('class_id', null, ['ng-model' => 'schedule.class_id', 'ng-init' => 'schedule.class_id='. $class->class_id]) !!}
    @endif
</div>

<div class="box-footer">
    <button type="submit" class="btn btn-primary">Save</button>
</div>