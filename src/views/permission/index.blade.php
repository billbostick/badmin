@extends('badmin::layouts.master')
@section('title')Permissions @stop
@section('content')
@include('badmin::partials.nav-partial', array('active' => 'Permissions'))
@include('badmin::partials.delete-confirm')
<table class="table table-condensed">
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Permitted Operations</th>
      <th></th>
    </tr>
  </thead>

  <tbody>
  @foreach ($permissions as $permission)
    <tr>
      <td>{{ $permission->name }}</td>
      <td>{{ $permission->description }}</td>
      <td>
        @if ($permission->slug)
          @if ($permission->slug['create'])
            Create 
          @endif
          @if ($permission->slug['view'])
            View 
          @endif
          @if ($permission->slug['update'])
            Update 
          @endif
          @if ($permission->slug['delete'])
            Delete 
          @endif
        @endif
      </td>
      <td>
        <a href="/admin/permission/{{ $permission->id }}/edit" class="btn btn-xs btn-info pull-left" style="margin-right: 3px;">Edit</a>
        {!! Form::open(['url' => '/admin/permission/' . $permission->id, 'method' => 'DELETE']) !!}
        {!! Form::button('Delete', ['class' => 'btn btn-xs btn-danger',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#confirmDelete',
                                    'data-title' => 'Delete Permission',
                                    'data-message' => 'Are you sure you want to delete permission ' . $permission->name . '?'])!!}
        {!! Form::close() !!}
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
<a href="/admin/permission/create" class="btn btn-primary">Add Permission</a>
@stop

