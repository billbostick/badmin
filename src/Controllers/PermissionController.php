<?php

namespace Bostick\Badmin\Controllers;

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
      return View::make('badmin::permission.index', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return View::make('badmin::permission.create');
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
      $perms['create'] = (Input::get('create') == null) ? false : true;
      $perms['view'] = (Input::get('view') == null) ? false : true;
      $perms['update'] = (Input::get('update') == null) ? false : true;
      $perms['delete'] = (Input::get('delete') == null) ? false : true;
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
        return View::make('badmin::permission.edit', [ 'permission' => $permission ]);
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

      $perms['create'] = (Input::get('create') == null) ? false : true;
      $perms['view'] = (Input::get('view') == null) ? false : true;
      $perms['update'] = (Input::get('update') == null) ? false : true;
      $perms['delete'] = (Input::get('delete') == null) ? false : true;
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
