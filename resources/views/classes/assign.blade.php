@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Assign Students to class schedule
        <small>Assign multiple students to class.</small>
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary" ng-controller="assignController">
                <div class="box-header with-border">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home')}}"><i class="fa fa-photo"></i> Home</a></li>
                        <li> Assign Students</li>
                    </ol>
                    
                      <div class="row">
                        <div class="col-md-12">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ $message}}
                            </div>
                            @endif
                            
                            @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ $message}}
                            </div>
                            @endif
                        </div>

                    </div>
                    
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
                    {!! Form::open(['method' => 'POST', 'route' => ['assign_store']]) !!}
                @else
                    {!! Form::model($class, ['method' => 'PATCH','route' => ['class.update', $class->class_id]]) !!}
                @endif

                @include('forms.assign')

                {!! Form::close() !!}
            </div>
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

