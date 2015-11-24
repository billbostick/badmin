<?php

namespace Bostick\Badmin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Kodeine\Acl\Models\Eloquent\Role;
use Kodeine\Acl\Models\Eloquent\Permission;
use View;
use Input;
use Hash;
use Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all();
      return View::make('user.index', ['users' => $users]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return View::make('user.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = new User;
      $user->name = Input::get('name');
      $user->email = Input::get('email');
      $user->password = Hash::make(Input::get('password'));
      $user->save();

      $roles = Role::all();
      foreach ($roles as $role) {
        if (Input::get($role->slug)) {
          $user->assignRole($role->slug);
        }
      }

      return Redirect::to('/admin/user');  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::find($id);
      $roles = Role::all();
      $userRoles = $user->getRoles();
      return View::make('user.edit', [ 'user' => $user, 'roles' => $roles, 'userRoles' => $userRoles ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $user = User::find($id);

      $user->name = Input::get('name');
      $user->email = Input::get('email');
      $user->password = Hash::make(Input::get('password'));

      $roles = Role::all();
      foreach ($roles as $role) {
        if (Input::get($role->slug)) {
          $user->assignRole($role->slug);
        } else {
          $user->revokeRole($role->slug);
        }
      }
      $user->save();

      return Redirect::to('/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      User::destroy($id);
      return Redirect::to('/admin/user');
    }

    public function getUserPermissions($id)
    {
      $user = User::find($id);
      $permissions = Permission::all();
      $userPerms = $user->permissions->lists('slug', 'name');
      return View::make('user.permissions', [ 'user' => $user, 'permissions' => $permissions, 'userPerms' => $userPerms ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUserPermissions(Request $request, $id)
    {
      $user = User::find($id);
      $permissions = Permission::all();
      foreach ($permissions as $permission) {
        if (Input::get($permission->name)) {
          $user->addPermission($permission->name);
        } else {
          $user->removePermission($permission->name);
        }
      }
      $user->save();

      return Redirect::to('/admin/user');
    }

}
