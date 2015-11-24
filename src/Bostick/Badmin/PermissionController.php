<?php

namespace Bostick\Badmin

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Kodeine\Acl\Models\Eloquent\Permission;
use Kodeine\Acl\Models\Eloquent\Role;
use View;
use Input;
use Redirect;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $permissions = Permission::all();
      return View::make('permission.index', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return View::make('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $permission = new Permission;
      $perms = array();

      if (Input::get('create')) {
        $perms['create'] = true;
      } else {
        $perms['create'] = false;
      }

      if (Input::get('view')) {
        $perms['view'] = true;
      } else {
        $perms['view'] = false;
      }

      if (Input::get('update')) {
        $perms['update'] = true;
      } else {
        $perms['update'] = false;
      }

      if (Input::get('delete')) {
        $perms['delete'] = true;
      } else {
        $perms['delete'] = false;
      }

      $permission->slug = $perms;
      $permission->name = Input::get('name');
      $permission->description = Input::get('description');

        $permission->save();

        return Redirect::to('/admin/permission');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        return View::make('permission.edit', [ 'permission' => $permission ]);
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
        $permission = Permission::find($id);
        $permission->name = Input::get('name');
        $permission->description = Input::get('description');
      $perms = array();

      if (Input::get('create')) {
        $perms['create'] = true;
      } else {
        $perms['create'] = false;
      }

      if (Input::get('view')) {
        $perms['view'] = true;
      } else {
        $perms['view'] = false;
      }

      if (Input::get('update')) {
        $perms['update'] = true;
      } else {
        $perms['update'] = false;
      }

      if (Input::get('delete')) {
        $perms['delete'] = true;
      } else {
        $perms['delete'] = false;
      }

      $permission->slug = $perms;
        $permission->save();

        return Redirect::to('/admin/permission');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::destroy($id);
        return Redirect::to('/admin/permission');

    }
}
