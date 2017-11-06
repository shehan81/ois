@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Add a Class Schedule
        <small> @if($method == 'create')New Class Schedule form.@else Edit Class Information @endif</small>
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary" ng-controller="scheduleController">
                <div class="box-header with-border">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home')}}"><i class="fa fa-photo"></i> Home</a></li>
                        <li><a href="{{ route('class.index')}}"> Class Schedules</a></li>
                        <li class="active">
                            @if($method == 'create')
                                Create
                            @else
                                Edit
                            @endif
                        </li>
                    </ol>
                    
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Warning!</strong> There were some problems with the data entered.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>

                @if($method == 'create')
                    {!! Form::open(['method' => 'POST', 'route' => ['class.store']]) !!}
                @else
                    {!! Form::model($class, ['method' => 'PATCH','route' => ['class.update', $class->class_id]]) !!}
                @endif

                @include('forms.class')

                {!! Form::close() !!}
            </div>
        </div>
</section>
@endsection

@section('modulescripts')
    <script type="text/javascript">
        var is_edit = true;
    </script>
    <script src="{{ asset('js/lib/angular/angular.min.js') }}"></script>
    <script src="{{ asset('js/lib/angular/angular-route.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/controllers.js') }}"></script>
    <script src="{{ asset('js/modules/class.js') }}"></script>
@stop

