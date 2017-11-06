<div class="box-body">
     <div class="row">
        <div class="form-group col-md-6 {{ $errors->has('day') ? ' has-error' : ''}}">
            {{ csrf_field()}}
            <label for="day">Class Day</label>
            @if($method == 'create')
            <select name='day' ng-model='schedule.day' ng-change='getTimeFrames()' class='form-control'>
                <option value="">Select Class Schedule Day</option>
                <option ng-repeat='day in weekdays' value='<%day%>'><%day%></option>
            </select>
            @else
             {{ Form::select('day', array($class->day => $class->day), null, ['class' => 'form-control', 'readonly' => 'true']) }}
            @endif
        </div>
         
        <div class="form-group col-md-6 {{ $errors->has('timeframe') ? ' has-error' : ''}}">
            <label for="timeframe">Time Frame</label>
            @if($method == 'create')
            <select name='timeframe_id' ng-model='schedule.timeframe_id' class='form-control' ng-change='getClasses()' ng-disabled='!schedule.day'>
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
            <span class='text-danger'>*</span> <label for="day">Available Classes</label>
            @if($method == 'create')
            <select name='class_id' ng-model='schedule.class_id' class='form-control' ng-disabled='!schedule.timeframe_id' ng-change='getStudents()'>
                <option value="">Select Class </option>
                <option ng-repeat='(class_id, class) in classes' value='<%class_id%>'><%class%></option>
            </select>
            @else
             {{ Form::select('class_id', array($class->class_id => $class->subject->title), null, ['class' => 'form-control', 'readonly' => 'true']) }}
            @endif
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-md-12">
            <p class='text-info'>Use the Day/ Timeframe filters and choose a class to assign students. You can assign multiple students</p>
        </div>
    </div>
    
    <div class='row'>
        <div class="form-group col-md-12">
            <span class='text-danger'>*</span> <label for="email">Available Students for this class</label>
            <div class="form-group">
                 <select name='students[]' ng-model='schedule.students' multiple='true' class='form-control' ng-disabled='!schedule.class_id' style='height:140px'>
                    <option ng-repeat='(student_id, student) in students' value='<%student_id%>'><%student%></option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="box-footer">
    <button type="submit" class="btn btn-primary">Assign</button>
</div>