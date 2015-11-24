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
Route::get('admin/user/{id}/permissions', 'bostick\badmin\UserController@getUserPermissions');
Route::post('admin/user/{id}/permissions', 'bostick\badmin\UserController@postUserPermissions');
Route::resource('admin/user', 'bostick\badmin\UserController');
Route::resource('admin/role', 'bostick\badmin\RoleController');
Route::resource('admin/permission', 'bostick\badmin\PermissionController');

Route::get('admin/access', 'bostick\badmin\PermissionRoleController@index');
Route::post('admin/access', 'bostick\badmin\PermissionRoleController@store');


