@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Subject
        <small>Edit Subject Information</small>
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
                        <li><a href="{{ route('home')}}"><i class="fa fa-photo"></i> Home</a></li>
                        <li><a href="{{ route('subject.index')}}"> Subjects</a></li>
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
                    {!! Form::open(['method' => 'POST','route' => ['subject.store']]) !!}
                @else
                    {!! Form::model($subject, ['method' => 'PATCH','route' => ['subject.update', $subject->subject_id]]) !!}
                @endif

                @include('forms.subject')

                {!! Form::close() !!}
            </div>
        </div>
</section>
@endsection
