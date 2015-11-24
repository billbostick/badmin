@extends('badmin::layouts.master')
@section('title')Edit Role @stop
@section('content')
@include('badmin::partials.nav-partial', array('active' => 'Roles'))
{!! Form::model($role, ['role' => 'form', 'url' => '/admin/role/' . $role->id, 'method' => 'PUT']) !!}
<div class='form-group'>
  {!! Form::label('name', 'Name') !!}
  {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
</div>
<div class='form-group'>
  {!! Form::label('slug', 'Slug') !!}
  {!! Form::text('slug', null, ['placeholder' => 'Slug', 'class' => 'form-control']) !!}
</div>
<div class='form-group'>
  {!! Form::label('description', 'Description') !!}
  {!! Form::text('description', null, ['placeholder' => 'Description', 'class' => 'form-control']) !!}
</div>
<div class='form-group'>
  {!! Form::submit('Save', ['class' => 'btn btn-sm btn-primary']) !!}
  <a href="{{ URL::previous() }}" class="btn btn-sm btn-default">Cancel</a>
</div>
{!! Form::close() !!}
@stop

