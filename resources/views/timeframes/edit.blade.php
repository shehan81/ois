@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Time frame
        <small> @if($method == 'create')New Time frame @else Edit Time frame  @endif</small>
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
                        <li><a href="{{ route('timeframe.index')}}"> Time frames</a></li>
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
                    {!! Form::open(['method' => 'POST','route' => ['timeframe.store']]) !!}
                @else
                    {!! Form::model($timeframe, ['method' => 'PATCH','route' => ['timeframe.update', $timeframe->timeframe_id]]) !!}
                @endif

                @include('forms.timeframe')

                {!! Form::close() !!}
            </div>
        </div>
</section>
@endsection

@section('modulescripts')
    <script type="text/javascript">
        //translations via view composer
        var trans_del = JSON.parse('{!! $jstrans !!}').confirm_delete;
        var is_edit = true;
    </script>
    <script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('js/modules/timeframe.js') }}"></script>
@stop
