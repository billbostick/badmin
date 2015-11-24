<?php namespace Bostick\Badmin\lib {
  use Role;
  use Permission;


  class utilLib {

    public function RoleHasPermission($role, $permission) {
      $rolePerms = $role->getPermissions()->all();
      while ($rp = current($rolePerms)) {
        if (key($rolePerms) == $permission) {
          return true;
        }
        next($rolePerms);
      }
      return false;
    }

    public function UserHasPermission($user, $permission) {
      $userPerms = $user->permissions->lists('name')->all();
      foreach ($userPerms as $userPerm) {      
        if ($userPerm == $permission) {
          return true;
        }
      }
      return false;
    }

    public function UserHasPermissionViaRole($user, $permission) {
      foreach ($user->roles as $role) {
        if ($this->RoleHasPermission($role, $permission)) {
          return true;
        }
      }
      return false;
    }
  }
}

