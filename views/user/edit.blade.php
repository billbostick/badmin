@extends('layouts.master')
@section('title')Edit User @stop
@section('content')
@include('partials.nav-partial', array('active' => 'Users'))
{!! Form::model($user, ['role' => 'form', 'url' => '/admin/user/' . $user->id, 'method' => 'PUT']) !!}
<div class='form-group'>
  {!! Form::label('name', 'Username') !!}
  {!! Form::text('name', null, ['placeholder' => 'Username', 'class' => 'form-control']) !!}
</div>
<div class='form-group'>
  {!! Form::label('email', 'Email') !!}
  {!! Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
</div>
<div class='form-group'>
  {!! Form::label('password', 'Password') !!}
  {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
</div>
<div class='form-group'>
  {!! Form::label('password_confirmation', 'Confirm Password') !!}
  {!! Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
</div>

<div class='panel panel-default'>
  <div class='panel-heading'>
    <h3 class='panel-title'>Roles</h3>
  </div>
  <div class='panel-body'>
    <div class='form-group'>
      @foreach ($roles as $role)
        {!! Form::checkbox($role->slug, $role->id, in_array($role->slug, $userRoles->all())) !!}
        {!! Form::label('role', $role->name) !!} 
        {!! ' - ' . $role->description; !!}
        <br />
      @endforeach
    </div>
  </div>
</div>

<div class='form-group'>
  {!! Form::submit('Save', ['class' => 'btn btn-sm btn-primary']) !!}
  <a href="{{ URL::previous() }}" class="btn btn-sm btn-default">Cancel</a>
</div>
{!! Form::close() !!}
@stop
