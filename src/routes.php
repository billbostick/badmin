<?php

/**
 * badmin routes
 */

// Authentication routes...
Route::get('login', '\App\Http\Controllers\Auth\AuthController@getLogin');
Route::post('login', '\App\Http\Controllers\Auth\AuthController@postLogin');
Route::get('logout', '\App\Http\Controllers\Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', '\App\Http\Controllers\Auth\AuthController@getRegister');
Route::post('register', '\App\Http\Controllers\Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', '\App\Http\Controllers\Auth\PasswordController@getEmail');
Route::post('password/email', '\App\Http\Controllers\Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', '\App\Http\Controllers\Auth\PasswordController@getReset');
Route::post('password/reset', '\App\Http\Controllers\Auth\PasswordController@postReset');

// Admin routs
Route::get('admin/user/{id}/permissions', 'Bostick\Badmin\Controllers\UserController@getUserPermissions');
Route::post('admin/user/{id}/permissions', 'Bostick\Badmin\Controllers\UserController@postUserPermissions');
Route::resource('admin/user', 'Bostick\Badmin\Controllers\UserController');
Route::resource('admin/role', 'Bostick\Badmin\Controllers\RoleController');
Route::resource('admin/permission', 'Bostick\Badmin\Controllers\PermissionController');

Route::get('admin/access', 'Bostick\Badmin\Controllers\PermissionRoleController@index');
Route::post('admin/access', 'Bostick\Badmin\Controllers\PermissionRoleController@store');


