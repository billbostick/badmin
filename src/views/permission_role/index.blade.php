@extends('badmin::layouts.master')
@section('title')Permissions @stop
@section('content')
@include('badmin::partials.nav-partial', array('active' => 'Access'))
<table class="table table-condensed">
  {!! Form::open(['role' => 'form', 'url' => '/admin/access']) !!}
  <thead>
    <tr>
      <th></th>
      @foreach ($roles as $role)
        <th class='text-center'>{{ $role->name }}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>
  @foreach ($permissions as $permission)
    <tr>
      <td> {{ $permission->name }} <br /> {{ $permission->description }} </td>
      @foreach ($roles as $role)
        <td class='text-center'>
<?php 
  $utilLib= new \App\lib\utilLib;
?>
          {!! Form::checkbox($role->id . '-' . $permission->id, 
                             $role->id . '-' . $permission->id, 
                             $utilLib->RoleHasPermission($role, $permission->name)  ) !!}
        </td>
      @endforeach
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


