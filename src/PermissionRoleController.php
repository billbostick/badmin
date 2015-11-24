<?php

namespace Bostick\Badnin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Kodeine\Acl\Models\Eloquent\Permission;
use Kodeine\Acl\Models\Eloquent\Role;
use View;
use Input;
use Redirect;

class PermissionRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $roles = Role::all();
      $permissions = Permission::all();
      return View::make('permission_role.index', ['roles' => $roles, 'permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $roles = Role::all();
      $permissions = Permission::all();
      foreach ($permissions as $permission) {
        foreach ($roles as $role) {
          $next = $role->id . '-' . $permission->id;
          if (Input::get($next)) {
            $role->assignPermission($permission);
          } else {
            $role->revokePermission($permission);
          }
        }
      }
      return Redirect::to('/admin/access');

    }
}
