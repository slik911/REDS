<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('role', [App\Http\Controllers\RoleController::class, 'index'])->name('admin.role');
Route::get('role/create', [App\Http\Controllers\RoleController::class, 'create'])->name('admin.role.create');
Route::post('role/create', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.role.store');
Route::get('role/edit/{uuid}', [App\Http\Controllers\RoleController::class, 'edit'])->name('admin.role.edit');
Route::put('role/edit', [App\Http\Controllers\RoleController::class, 'update'])->name('admin.role.update');
Route::delete('role/delete', [App\Http\Controllers\RoleController::class, 'delete'])->name('admin.role.delete');

Route::get('staff', [App\Http\Controllers\UserController::class, 'index'])->name('admin.staff');
Route::get('staff/create', [App\Http\Controllers\UserController::class, 'create'])->name('admin.staff.create');
Route::post('staff/create', [App\Http\Controllers\UserController::class, 'store'])->name('admin.staff.store');
Route::get('staff/edit/{uuid}', [App\Http\Controllers\UserController::class, 'edit'])->name('admin.staff.edit');
Route::put('staff/update', [App\Http\Controllers\UserController::class, 'update'])->name('admin.staff.update');
Route::delete('staff/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('admin.staff.delete');

Route::get('client', [App\Http\Controllers\ClientController::class, 'index'])->name('admin.client');
Route::get('client/create', [App\Http\Controllers\ClientController::class, 'create'])->name('admin.client.create');
Route::post('client/create', [App\Http\Controllers\ClientController::class, 'store'])->name('admin.client.store');
Route::get('client/edit/{uuid}', [App\Http\Controllers\ClientController::class, 'edit'])->name('admin.client.edit');
Route::put('client/update', [App\Http\Controllers\ClientController::class, 'update'])->name('admin.client.update');
Route::delete('client/delete', [App\Http\Controllers\ClientController::class, 'delete'])->name('admin.client.delete');

Route::get('service', [App\Http\Controllers\ServiceListController::class, 'index'])->name('admin.service');
Route::get('service/create', [App\Http\Controllers\ServiceListController::class, 'create'])->name('admin.service.create');
Route::post('service/create', [App\Http\Controllers\ServiceListController::class, 'store'])->name('admin.service.store');
Route::get('service/edit/{uuid}', [App\Http\Controllers\ServiceListController::class, 'edit'])->name('admin.service.edit');
Route::put('service/edit', [App\Http\Controllers\ServiceListController::class, 'update'])->name('admin.service.update');
Route::delete('service/delete', [App\Http\Controllers\ServiceListController::class, 'delete'])->name('admin.service.delete');

Route::get('category', [App\Http\Controllers\CategoryController::class, 'index'])->name('admin.category');
Route::get('category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('admin.category.create');
Route::post('category/create', [App\Http\Controllers\CategoryController::class, 'store'])->name('admin.category.store');
Route::get('category/edit/{uuid}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('admin.category.edit');
Route::put('category/edit', [App\Http\Controllers\CategoryController::class, 'update'])->name('admin.category.update');
Route::delete('category/delete', [App\Http\Controllers\CategoryController::class, 'delete'])->name('admin.category.delete');
