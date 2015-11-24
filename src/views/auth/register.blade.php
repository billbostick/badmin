@extends('badmin::layouts.master')
@section('content')
<h1>Register</h1>
<form method="POST" action="/register">
  {!! csrf_field() !!}
  <div class='form-group'>
    {!! Form::label('name', 'Username') !!}
    {!! Form::text('name', old('name'), ['placeholder' => 'Username', 'class' => 'form-control']) !!}
  </div>
  <div class='form-group'>
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', old('email'), ['placeholder' => 'Email', 'class' => 'form-control']) !!}
  </div>
  <div class='form-group'>
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
  </div>
  <div class='form-group'>
    {!! Form::label('password', 'Confirm Password') !!}
    {!! Form::password('password_confirmation', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
  </div>
  <div class='form-group'>
    {!! Form::submit('Register', ['class' => 'btn btn-primary']) !!}
  </div>
</form>
@stop


