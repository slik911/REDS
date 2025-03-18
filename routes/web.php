<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {


Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('welcome');
Route::get('/about', [App\Http\Controllers\WebController::class, 'about'])->name('about');
Route::get('/rental', [App\Http\Controllers\WebController::class, 'rental'])->name('rental');
Route::get('/renovations', [App\Http\Controllers\WebController::class, 'reno'])->name('reno');
Route::get('/project', [App\Http\Controllers\WebController::class, 'project'])->name('project');
Route::get('/contact', [App\Http\Controllers\WebController::class, 'contact'])->name('contact');
Route::get('/quote', [App\Http\Controllers\WebController::class, 'quote'])->name('quote');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('admin.profile');

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

Route::get('rfq', [App\Http\Controllers\RFQController::class, 'index'])->name('admin.rfq');
Route::post('rfq/create', [App\Http\Controllers\RFQController::class, 'store'])->name('admin.rfq.store');
Route::get('rfq/view/{uuid}', [App\Http\Controllers\RFQController::class, 'view'])->name('admin.rfq.view');
Route::get('rfq/preview/{uuid}', [App\Http\Controllers\RFQController::class, 'preview'])->name('admin.rfq.preview');

Route::get('renovation', [App\Http\Controllers\PostController::class, 'index'])->name('admin.renovation');
Route::get('renovation/create', [App\Http\Controllers\PostController::class, 'create'])->name('admin.renovation.create');
Route::post('renovation/create', [App\Http\Controllers\PostController::class, 'store'])->name('admin.renovation.store');
Route::get('renovation/status/update/{post_id}', [App\Http\Controllers\PostController::class, 'updateStatus'])->name('admin.renovation.status.update');
Route::get('renovation/edit/{post_id}', [App\Http\Controllers\PostController::class, 'edit'])->name('admin.renovation.edit');
Route::post('/delete/image', [App\Http\Controllers\PostController::class, 'deleteImage'])->name('admin.renovation.delete.image');
Route::put('renovation/edit', [App\Http\Controllers\PostController::class, 'update'])->name('admin.renovation.update');
Route::delete('renovation/delete', [App\Http\Controllers\PostController::class, 'delete'])->name('admin.renovation.delete');

Route::get('rentals', [App\Http\Controllers\RentalController::class, 'index'])->name('admin.rentals');
Route::get('rentals/create', [App\Http\Controllers\RentalController::class, 'create'])->name('admin.rentals.create');
Route::post('rentals/create', [App\Http\Controllers\RentalController::class, 'store'])->name('admin.rentals.store');
Route::get('rentals/status/update/{post_id}', [App\Http\Controllers\RentalController::class, 'updateStatus'])->name('admin.rentals.status.update');
Route::get('rentals/edit/{post_id}', [App\Http\Controllers\RentalController::class, 'edit'])->name('admin.rentals.edit');
Route::put('rentals/edit', [App\Http\Controllers\RentalController::class, 'update'])->name('admin.rentals.update');
Route::delete('rentals/delete', [App\Http\Controllers\RentalController::class, 'delete'])->name('admin.rentals.delete');




Route::get('quotations', [App\Http\Controllers\QuotationController::class, 'index'])->name('admin.quotation');
Route::get('quotations/create', [App\Http\Controllers\QuotationController::class, 'create'])->name('admin.quotation.create');
Route::post('quotations/create', [App\Http\Controllers\QuotationController::class, 'store'])->name('admin.quotation.store');
Route::get('/client/info', [App\Http\Controllers\QuotationController::class, 'getClientInfo'])->name('admin.quotation.client.info.get');
Route::post('quotations/create', [App\Http\Controllers\QuotationController::class, 'store'])->name('admin.quotation.store');
Route::get('quotations/change/status/{status}/{quote_id}', [App\Http\Controllers\QuotationController::class, 'changeStatus'])->name('admin.quotation.change.status'); 
Route::get('quotations/send/mail/{quote_id}',  [App\Http\Controllers\QuotationController::class, 'sendMail'])->name('admin.quotation.send');
Route::get('quotations/preview/{quote_id}',  [App\Http\Controllers\QuotationController::class, 'preview'])->name('admin.quotation.preview');

Route::get('/mail', [App\Http\Controllers\QuotationController::class, 'quote'])->name('admin.quotation.view');