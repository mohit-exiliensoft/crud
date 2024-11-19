<?php 

use Illuminate\Support\Facades\Route;
use User\Crud\Http\Controllers\PermissionController;
use User\Crud\Http\Controllers\RoleController;
use User\Crud\Http\Controllers\UserController;


Route::resource('users', UserController::class);
Route::resource('permission', PermissionController::class);
Route::resource('role', RoleController::class);