<?php

use App\Http\Controllers\Controller;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\SessionTimeOutMiddleware;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {


Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('welcome');
Route::get('/about', [App\Http\Controllers\WebController::class, 'about'])->name('about');
Route::get('/rental', [App\Http\Controllers\WebController::class, 'rental'])->name('rental');
Route::get('rental/preview/{uuid}', [App\Http\Controllers\WebController::class, 'rentalPreview'])->name('rental.preview');
Route::get('/renovations', [App\Http\Controllers\WebController::class, 'reno'])->name('reno');
Route::get('/project', [App\Http\Controllers\WebController::class, 'project'])->name('project');
Route::get('project/preview/{uuid}', [App\Http\Controllers\WebController::class, 'projectPreview'])->name('project.preview');
Route::get('/contact', [App\Http\Controllers\WebController::class, 'contact'])->name('contact');
Route::post('/contact', [App\Http\Controllers\WebController::class, 'contactMail'])->name('contact.mail');
Route::get('/quote', [App\Http\Controllers\WebController::class, 'quote'])->name('quote');
Route::get('/faq', [App\Http\Controllers\WebController::class, 'faq'])->name('faq');
Route::get('/privacy', [App\Http\Controllers\WebController::class, 'privacy'])->name('privacy');
Route::get('/terms', [App\Http\Controllers\WebController::class, 'terms'])->name('terms');
Route::get('/feedback/{uuid}', [App\Http\Controllers\WebController::class, 'testimonial'])->name('feedback.show');
Route::post('/feedback', [App\Http\Controllers\WebController::class, 'storeTestimonial'])->name('feedback.store');
Route::post('rfq/create', [App\Http\Controllers\RFQController::class, 'store'])->name('admin.rfq.store');

Auth::routes();

Route::middleware([SessionTimeOutMiddleware::class, Authenticate::class])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('admin.profile');
Route::put('profile/update/password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('admin.profile.update.password');

Route::get('role', [App\Http\Controllers\RoleController::class, 'index'])->name('admin.role');
Route::get('role/create', [App\Http\Controllers\RoleController::class, 'create'])->name('admin.role.create');
Route::post('role/create', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.role.store');
Route::get('role/edit/{uuid}', [App\Http\Controllers\RoleController::class, 'edit'])->name('admin.role.edit');
Route::put('role/edit', [App\Http\Controllers\RoleController::class, 'update'])->name('admin.role.update');
Route::delete('role/delete', [App\Http\Controllers\RoleController::class, 'delete'])->name('admin.role.delete');

Route::middleware([AdminMiddleware::class])->group(function () {
Route::get('staff', [App\Http\Controllers\UserController::class, 'index'])->name('admin.staff');
Route::get('staff/create', [App\Http\Controllers\UserController::class, 'create'])->name('admin.staff.create');
Route::post('staff/create', [App\Http\Controllers\UserController::class, 'store'])->name('admin.staff.store');
Route::get('staff/edit/{uuid}', [App\Http\Controllers\UserController::class, 'edit'])->name('admin.staff.edit');
Route::put('staff/update', [App\Http\Controllers\UserController::class, 'update'])->name('admin.staff.update');
Route::delete('staff/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('admin.staff.delete');
Route::get('staff/status/update/{uuid}', [App\Http\Controllers\UserController::class, 'updateStatus'])->name('admin.staff.status');
});

Route::get('client', [App\Http\Controllers\ClientController::class, 'index'])->name('admin.client');
Route::get('client/create', [App\Http\Controllers\ClientController::class, 'create'])->name('admin.client.create');
Route::post('client/create', [App\Http\Controllers\ClientController::class, 'store'])->name('admin.client.store');
Route::get('client/edit/{uuid}', [App\Http\Controllers\ClientController::class, 'edit'])->name('admin.client.edit');
Route::put('client/update', [App\Http\Controllers\ClientController::class, 'update'])->name('admin.client.update');
Route::delete('client/delete', [App\Http\Controllers\ClientController::class, 'delete'])->name('admin.client.delete');

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('service', [App\Http\Controllers\ServiceListController::class, 'index'])->name('admin.service');
    Route::get('service/create', [App\Http\Controllers\ServiceListController::class, 'create'])->name('admin.service.create');
    Route::post('service/create', [App\Http\Controllers\ServiceListController::class, 'store'])->name('admin.service.store');
    Route::get('service/edit/{uuid}', [App\Http\Controllers\ServiceListController::class, 'edit'])->name('admin.service.edit');
    Route::put('service/edit', [App\Http\Controllers\ServiceListController::class, 'update'])->name('admin.service.update');
    Route::get('service/status/update/{uuid}', [App\Http\Controllers\ServiceListController::class, 'updateStatus'])->name('admin.service.status');
    Route::delete('service/delete', [App\Http\Controllers\ServiceListController::class, 'delete'])->name('admin.service.delete');
});

Route::middleware([AdminMiddleware::class])->group(function () {
Route::get('category', [App\Http\Controllers\CategoryController::class, 'index'])->name('admin.category');
Route::get('category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('admin.category.create');
Route::post('category/create', [App\Http\Controllers\CategoryController::class, 'store'])->name('admin.category.store');
Route::get('category/edit/{uuid}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('admin.category.edit');
Route::put('category/edit', [App\Http\Controllers\CategoryController::class, 'update'])->name('admin.category.update');
Route::delete('category/delete', [App\Http\Controllers\CategoryController::class, 'delete'])->name('admin.category.delete');
});

Route::get('rfq', [App\Http\Controllers\RFQController::class, 'index'])->name('admin.rfq');

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
Route::get('quotations/create/{client_id?}/{rfq_id?}', [App\Http\Controllers\QuotationController::class, 'create'])->name('admin.quotation.create');
Route::post('quotations/create', [App\Http\Controllers\QuotationController::class, 'store'])->name('admin.quotation.store');
Route::get('/client/info', [App\Http\Controllers\QuotationController::class, 'getClientInfo'])->name('admin.quotation.client.info.get');
Route::post('quotations/create', [App\Http\Controllers\QuotationController::class, 'store'])->name('admin.quotation.store');
Route::get('quotations/edit/{uuid}', [App\Http\Controllers\QuotationController::class, 'edit'])->name('admin.quotation.edit');
Route::put('quotations/edit', [App\Http\Controllers\QuotationController::class, 'update'])->name('admin.quotation.update');
Route::get('quotations/change/status/{status}/{quote_id}', [App\Http\Controllers\QuotationController::class, 'changeStatus'])->name('admin.quotation.change.status');
Route::get('quotations/send/mail/{quote_id}',  [App\Http\Controllers\QuotationController::class, 'sendMail'])->name('admin.quotation.send');
Route::get('quotations/preview/{quote_id}',  [App\Http\Controllers\QuotationController::class, 'preview'])->name('admin.quotation.preview');
Route::post('quotations/cancel', [App\Http\Controllers\QuotationController::class, 'cancel'])->name('admin.quotation.cancel');
Route::delete('quotations/delete', [App\Http\Controllers\QuotationController::class, 'delete'])->name('admin.quotation.delete');

Route::get('testimonial', [App\Http\Controllers\TestimonialController::class, 'index'])->name('admin.testimonial');
Route::get('testimonial/create', [App\Http\Controllers\TestimonialController::class, 'create'])->name('admin.testimonial.create');
Route::post('testimonial/create', [App\Http\Controllers\TestimonialController::class, 'store'])->name('admin.testimonial.store');
Route::get('testimonial/edit/{uuid}', [App\Http\Controllers\TestimonialController::class, 'edit'])->name('admin.testimonial.edit');
Route::put('testimonial/edit', [App\Http\Controllers\TestimonialController::class, 'update'])->name('admin.testimonial.update');
Route::delete('testimonial/delete', [App\Http\Controllers\TestimonialController::class, 'delete'])->name('admin.testimonial.delete');
Route::get('/testimonial/status/update/{uuid}', [App\Http\Controllers\TestimonialController::class, 'updateStatus'])->name('admin.testimonial.status');
Route::get('/testimonial/preview/{uuid}', [App\Http\Controllers\TestimonialController::class, 'preview'])->name('admin.testimonial.preview');


Route::get('/mail', [App\Http\Controllers\QuotationController::class, 'quote'])->name('admin.quotation.view');
});