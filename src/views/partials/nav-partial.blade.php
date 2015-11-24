<ul class="nav nav-pills pull-right">

<div class="btn-group">
@if ($active == 'Users')
  <a type="button" class="btn btn-primary" href="/admin/user">Users</a>
  @else
  <a type="button" class="btn btn-default" href="/admin/user">Users</a>
  @endif
</div>

<div class="btn-group">
  @if ($active == 'Access')
  <a type="button" class="btn btn-primary" href="/admin/access">Access</a>
  @else
  <a type="button" class="btn btn-default" href="/admin/access">Access</a>
  @endif
</div>



<div class="btn-group">
  @if ($active == 'Roles')
  <a type="button" class="btn btn-primary" href="/admin/role">Roles</a>
  @else
  <a type="button" class="btn btn-default" href="/admin/role">Roles</a>
  @endif
</div>


<div class="btn-group">
  @if ($active == 'Permissions')
  <a type="button" class="btn btn-primary" href="/admin/permission">Permissions</a>
  @else
  <a type="button" class="btn btn-default" href="/admin/permission">Permissions</a>
  @endif
</div>

</ul>
<div style="clear:both"></div>
