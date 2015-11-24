@extends('badmin::layouts.master')
@section('title')Edit Permission @stop
@section('content')
@include('badmin::partials.nav-partial', array('active' => 'Permissions'))
{!! Form::model($permission, ['role' => 'form', 'url' => '/admin/permission/' . $permission->id, 'method' => 'PUT']) !!}
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
      {!! Form::checkbox('create', 'create', $permission->slug['create']) !!}
      {!! Form::label('create', 'Create') !!}
    </div>
    <div class='form-group checkbox-inline';>
      {!! Form::checkbox('view', 'view', $permission->slug['view']) !!}
      {!! Form::label('view', 'View') !!}
    </div>
    <div class='form-group checkbox-inline';>
      {!! Form::checkbox('update', 'update', $permission->slug['update']) !!}
      {!! Form::label('update', 'Update') !!}
    </div>
    <div class='form-group checkbox-inline';>
      {!! Form::checkbox('delete', 'delete', $permission->slug['delete']) !!}
      {!! Form::label('delete', 'Delete') !!}
    </div>
  </div>
</div>
<div class='form-group'>
  {!! Form::submit('Save', ['class' => 'btn btn-sm btn-primary']) !!}
  <a href="{{ URL::previous() }}" class="btn btn-sm btn-default">Cancel</a>
</div>
{!! Form::close() !!}
@stop

