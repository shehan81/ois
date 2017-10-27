@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                @if($errors->has('login'))
                <div class="alert alert-danger center-block" style="text-align: center">
                    {{$errors->first('login')}}
                </div>
                @endif
                
                
                    {!! Form::open(array('route' => 'login','method'=>'POST', 'class'=> 'form-horizontal')) !!}
                    @include('forms.login')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection