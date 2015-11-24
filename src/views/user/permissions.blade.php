@extends('layouts.master')
@section('title')User Permissions @stop
@section('content')
<?php $utilLib= new \App\lib\utilLib; ?>
@include('partials.nav-partial', array('active' => 'Users'))
<h3>{{ $user->name }}</h3>
<table class="table table-condensed">
  {!! Form::open(['role' => 'form', 'url' => '/admin/user/' . $user->id . '/permissions']) !!}
  <thead>
    <tr>
      <th>Permission</th>
      <th>Description</th>
      <th>Inherited via Role</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($permissions as $permission)
    <tr>
      <td> {{ $permission->name }} </td>
      <td> {{ $permission->description }} </td>
      <td> {{ ($utilLib->UserHasPermissionViaRole($user, $permission->name)) ? 'Yes' : 'No' }}</td>
      <td class='text-center'>
        {!! Form::checkbox($permission->name, 
                           $permission->name, 
                           $utilLib->UserHasPermission($user, $permission->name)  ) !!}
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
<div class='form-group'>
  {!! Form::submit('Save', ['class' => 'btn btn-sm btn-primary']) !!}
  <a href="{{ URL::previous() }}" class="btn btn-sm btn-default">Cancel</a>
</div>
{!! Form::close() !!}
@stop


