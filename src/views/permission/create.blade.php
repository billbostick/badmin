@extends('layouts.master')
@section('title')Create Permission @stop
@section('content')
@include('partials.nav-partial', array('active' => 'Permissions'))
{!! Form::open(['role' => 'form', 'url' => '/admin/permission']) !!}
<div class='form-group'>
  {!! Form::label('name', 'Name') !!}
  {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
</div>
<div class='form-group'>
  {!! Form::label('description', 'Description') !!}
  {!! Form::text('description', null, ['placeholder' => 'Description', 'class' => 'form-control']) !!}
</div>

<div class='panel panel-default'>
  <div class='panel-heading'>
    <h3 class='panel-title'>Permitted Operations</h3>
  </div>
  <div class='panel-body'>
    <div class='form-group checkbox-inline';>
      {!! Form::checkbox('create', 'create', true) !!}
      {!! Form::label('create', 'Create') !!} 
    </div>
    <div class='form-group checkbox-inline';>
      {!! Form::checkbox('view', 'view', true) !!}
      {!! Form::label('view', 'View') !!} 
    </div>
    <div class='form-group checkbox-inline';>
      {!! Form::checkbox('update', 'update', true) !!}
      {!! Form::label('update', 'Update') !!} 
    </div>
    <div class='form-group checkbox-inline';>
      {!! Form::checkbox('delete', 'delete', true) !!}
      {!! Form::label('delete', 'Delete') !!} 
    </div>
  </div>
</div>

<div class='form-group'>
  {!! Form::submit('Add Permission', ['class' => 'btn btn-sm btn-primary']) !!}
  <a href="{{ URL::previous() }}" class="btn btn-sm btn-default">Cancel</a>
</div>
{!! Form::close() !!}
@stop

