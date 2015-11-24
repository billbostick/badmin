@extends('badmin::layouts.master')
@section('title')Users @stop
@section('content')
@include('badmin::partials.nav-partial', array('active' => 'Users'))
@include('badmin::partials.delete-confirm')
<table class="table table-condensed">
  <thead>
    <tr>
      <th>Username</th>
      <th>Roles</th>
      <th>Date Added</th>
      <th></th>
    </tr>
  </thead>

  <tbody>
  @foreach ($users as $user)
    <tr>
      <td>{{ $user->name }}</td>
      <td>{!! $user->getRoles()->implode(", ") !!}</td>
      <td>{{ $user->created_at->format('m/d/Y') }}</td>
      <td>
        <a href="/admin/user/{{ $user->id }}/edit" class="btn btn-xs btn-info pull-left" style="margin-right: 3px;">Edit</a>
<!--   <a href="/admin/user/{{ $user->id }}/permissions" class="btn btn-xs btn-info pull-left" style="margin-right: 3px;">Permissions</a> -->


        {!! Form::open(['url' => '/admin/user/' . $user->id, 'method' => 'DELETE']) !!}
        {!! Form::button('Delete', ['class' => 'btn btn-xs btn-danger', 
                                    'data-toggle' => 'modal', 
                                    'data-target' => '#confirmDelete', 
                                    'data-title' => 'Delete User', 
                                    'data-message' => 'Are you sure you want to delete user ' . $user->name . '?'])!!}
        {!! Form::close() !!}


      </td>
    </tr>
  @endforeach
  </tbody>
</table>
<a href="/admin/user/create" class="btn btn-primary">Add User</a>
@stop
