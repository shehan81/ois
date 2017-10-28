@extends('layouts.app')

@section('content')
<section class="content-header">
    <button type="button" class="btn bg-maroon btn-flat margin pull-right" onClick="location.href ='{{ route('timeframe.create')}}'">Add Time frame</button>
    <h1>
        Time Frame
        <small>Add, Edit & Delete time frames</small>
    </h1>
</section>
<!-- Main content -->
<section class="content" ng-controller="instuctorListCtrl">
    <!-- Small boxes (Stat box) -->
    <div class="box box-primary">
        <div class="box-header">
            <ol class="breadcrumb">
                <li><a href="{{ route('home')}}"><i class="fa fa-photo"></i> Home</a></li>
                <li class="active">Time frames</li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $message}}
                    </div>
                    @endif
                </div>
                
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered" id="time-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>From : time</th>
                        <th>To : time</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</section>
@endsection
@section('modulescripts')
    <script type="text/javascript">
        //translations via view composer
        var trans_del = JSON.parse('{!! $jstrans !!}').confirm_delete;
    </script>
    <script src="{{ asset('js/modules/timeframe.js') }}"></script>
@stop

