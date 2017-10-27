@extends('layouts.app')

@section('content')
<section class="content-header">
    <button type="button" class="btn bg-maroon btn-flat margin pull-right" onClick="location.href ='{{ route('instructor.create')}}'">Add Instructor</button>
    <h1>
        Instructors
        <small>Below is a list of instructors</small>
    </h1>
</section>
<!-- Main content -->
<section class="content" ng-controller="instuctorListCtrl">
    <!-- Small boxes (Stat box) -->
    <div class="box box-primary">
        <div class="box-header">
            <ol class="breadcrumb">
                <li><a href="{{ route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Instructors</li>
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
            <table class="table table-bordered" id="instructors-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</section>
@endsection
