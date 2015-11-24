<?php

/**
 * badmin routes
 */

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Admin routs
Route::get('admin/user/{id}/permissions', 'bostick\badmin\Controllers\UserController@getUserPermissions');
Route::post('admin/user/{id}/permissions', 'bostick\badmin\Controllers\UserController@postUserPermissions');
Route::resource('admin/user', 'bostick\badmin\Controllers\UserController');
Route::resource('admin/role', 'bostick\badmin\Controllers\RoleController');
Route::resource('admin/permission', 'bostick\badmin\Controllers\PermissionController');

Route::get('admin/access', 'bostick\badmin\Controllers\PermissionRoleController@index');
Route::post('admin/access', 'bostick\badmin\Controllers\PermissionRoleController@store');


