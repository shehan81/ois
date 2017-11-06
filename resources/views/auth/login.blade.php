@extends('layouts.wire')
@section('content')
<div class="login-box">
    <div class="login-box-body">
        <p class="login-box-msg">Login</p>
        {!! Form::open(array('route' => 'login','method'=>'POST')) !!}
        @include('forms.login')
        {!! Form::close() !!}
    </div>
</div>
@endsection