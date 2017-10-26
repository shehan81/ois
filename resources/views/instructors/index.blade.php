@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<!-- Main content -->
<section class="content" ng-controller="instuctorListCtrl">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Table With Full Features</h3>
                <a href="#" ng-click="getData();" >Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered" id="users-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</section>
@endsection
