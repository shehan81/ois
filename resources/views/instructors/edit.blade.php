@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Instructor
        <small>Edit Instructor's Information</small>
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="{{ route('instructor.index')}}"><i class="fa fa-dashboard"></i> Instructors</a></li>
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
                        <strong>Warning!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>

                @if($method == 'create')
                    {!! Form::open(['method' => 'POST','route' => ['instructor.store']]) !!}
                @else
                    {!! Form::model($instructor, ['method' => 'PATCH','route' => ['instructor.update', $instructor->instructor_id]]) !!}
                @endif

                @include('forms.instructor')

                {!! Form::close() !!}
            </div>
        </div>
</section>
@endsection
