@extends('layouts.master')
@section('title')Roles @stop
@section('content')
@include('partials.nav-partial', array('active' => 'Roles'))
@include('partials.delete-confirm')
<table class="table table-condensed">
  <thead>
    <tr>
      <th>Name</th>
      <th>Slug</th>
      <th>Description</th>
      <th></th>
    </tr>
  </thead>

  <tbody>
  @foreach ($roles as $role)
    <tr>
      <td>{{ $role->name }}</td>
      <td>{{ $role->slug }}</td>
      <td>{{ $role->description }}</td>
      <td>
        <a href="/admin/role/{{ $role->id }}/edit" class="btn btn-xs btn-info pull-left" style="margin-right: 3px;">Edit</a>
        {!! Form::open(['url' => '/admin/role/' . $role->id, 'method' => 'DELETE']) !!}
        {!! Form::button('Delete', ['class' => 'btn btn-xs btn-danger',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#confirmDelete',
                                    'data-title' => 'Delete Role',
                                    'data-message' => 'Are you sure you want to delete role ' . $role->name . '?'])!!}
        {!! Form::close() !!}
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
<a href="/admin/role/create" class="btn btn-primary">Add Role</a>
@stop

