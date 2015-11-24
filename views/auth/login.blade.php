@extends('layouts.master')
@section('content')
<h1>Login</h1>
<form method="POST" action="/login">
  {!! csrf_field() !!}
  <div class='form-group'>
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', old('email'), ['placeholder' => 'Email', 'class' => 'form-control']) !!}
  </div>
  <div class='form-group'>
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
  </div>
  <div class='form-group'>
    {!! Form::checkbox('remember') !!}
    {!! Form::label('remember', 'Remember Me') !!}
  </div>
  <div class='form-group'>
    {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
  </div>
</form>
@stop

