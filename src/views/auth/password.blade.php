@extends('layouts.master')
@section('content')
<h1>Reset Password</h1>
<form method="POST" action="/password/email">
  {!! csrf_field() !!}
  <div class='form-group'>
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', old('email'), ['placeholder' => 'Email', 'class' => 'form-control']) !!}
  </div>
  <div class='form-group'>
    {!! Form::submit('Send Password Reset Link', ['class' => 'btn btn-primary']) !!}
  </div>
</form>
@stop

