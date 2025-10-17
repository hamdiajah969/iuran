<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index'])->name('beranda.index');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware('authadmin')->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/create', [App\Http\Controllers\AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/admin/users', [App\Http\Controllers\AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [App\Http\Controllers\AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [App\Http\Controllers\AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('admin.users.delete');

    Route::get('/admin/members', [App\Http\Controllers\AdminController::class, 'members'])->name('admin.members');
    Route::get('/admin/members/create', [App\Http\Controllers\AdminController::class, 'createMember'])->name('admin.members.create');
    Route::post('/admin/members', [App\Http\Controllers\AdminController::class, 'storeMember'])->name('admin.members.store');
    Route::get('/admin/members/{member}/edit', [App\Http\Controllers\AdminController::class, 'editMember'])->name('admin.members.edit');
    Route::put('/admin/members/{member}', [App\Http\Controllers\AdminController::class, 'updateMember'])->name('admin.members.update');
    Route::delete('/admin/members/{member}', [App\Http\Controllers\AdminController::class, 'deleteMember'])->name('admin.members.delete');

    Route::get('/admin/categories', [App\Http\Controllers\AdminController::class, 'categories'])->name('admin.categories');
    Route::get('/admin/categories/create', [App\Http\Controllers\AdminController::class, 'createCategory'])->name('admin.categories.create');
    Route::post('/admin/categories', [App\Http\Controllers\AdminController::class, 'storeCategory'])->name('admin.categories.store');
    Route::get('/admin/categories/{category}/edit', [App\Http\Controllers\AdminController::class, 'editCategory'])->name('admin.categories.edit');
    Route::put('/admin/categories/{category}', [App\Http\Controllers\AdminController::class, 'updateCategory'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category}', [App\Http\Controllers\AdminController::class, 'deleteCategory'])->name('admin.categories.delete');

    Route::get('/admin/payments', [App\Http\Controllers\AdminController::class, 'payments'])->name('admin.payments');
    Route::get('/admin/payments/create', [App\Http\Controllers\AdminController::class, 'createPayment'])->name('admin.payments.create');
    Route::post('/admin/payments', [App\Http\Controllers\AdminController::class, 'storePayment'])->name('admin.payments.store');
    Route::get('/admin/payments/{payment}/detail', [App\Http\Controllers\AdminController::class, 'detailPayment'])->name('admin.payments.detail');
    Route::delete('/admin/payments/{payment}', [App\Http\Controllers\AdminController::class, 'deletePayment'])->name('admin.payments.delete');

    Route::get('/admin/warga', [App\Http\Controllers\AdminController::class, 'warga'])->name('admin.warga');
    Route::get('/admin/warga/create', [App\Http\Controllers\AdminController::class, 'createWarga'])->name('admin.warga.create');
    Route::post('/admin/warga', [App\Http\Controllers\AdminController::class, 'storeWarga'])->name('admin.warga.store');
    Route::get('/admin/warga/{user}/edit', [App\Http\Controllers\AdminController::class, 'editWarga'])->name('admin.warga.edit');
    Route::put('/admin/warga/{user}', [App\Http\Controllers\AdminController::class, 'updateWarga'])->name('admin.warga.update');
});

Route::middleware('authofficer')->group(function () {
    Route::get('/officer/dashboard', function () {
        return view('officer.dashboard');
    })->name('officer.dashboard');
});

Route::middleware('authwarga')->group(function () {
    Route::get('/warga/dashboard', function () {
        return view('warga.dashboard');
    })->name('warga.dashboard');

    Route::get('/warga/payment-history', [App\Http\Controllers\WargaController::class, 'paymentHistory'])->name('warga.payment_history');
});
