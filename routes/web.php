<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\AdminProfileController;




Route::controller(AdminProfileController::class)->group(function () {
    Route::get('/admin/profile', [AdminProfileController::class, 'show'])->name('admin.profile.show');
    Route::post('/admin/profile/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::post('/admin/profile/update-image', [AdminProfileController::class, 'updateImage'])->name('admin.profile.updateImage');
    Route::post('/admin/profile/delete-image', [AdminProfileController::class, 'deleteImage'])->name('admin.profile.deleteImage');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerSave')->name('register.save');

    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginAction')->name('login.action');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/Adminregister', 'Adminregister')->name('Adminregister');
    Route::post('/Adminregister', 'AdminregisterSave')->name('Adminregister.save');
  
    Route::get('/Adminlogin', 'Adminlogin')->name('Adminlogin');
    Route::post('/Adminlogin', 'AdminloginAction')->name('Adminlogin.action');
    Route::post('/Adminlogout', 'Adminlogout')->name('Adminlogout');
    
  
        Route::get('/dashboard', function () {
            return view('dashboard'); // ตรวจสอบว่ามีไฟล์ view dashboard.blade.php
        })->name('dashboard');
        

 
        // Admin User Management
        Route::prefix('admin/users')->group(function () {
            Route::get('/', 'index')->name('admin.users');
            Route::get('/create', 'create')->name('admin.users.create');
            Route::post('/', 'store')->name('admin.users.store');
            Route::get('/{id}/edit', 'edit')->name('admin.users.edit');
            Route::put('/{id}', 'update')->name('admin.users.update');
            Route::delete('/{id}', 'destroy')->name('admin.users.destroy');
        });
    });



Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('/', 'index')->name('products.index'); // หน้าหลักของ Products
    Route::get('create', 'create')->name('products.create');
    Route::post('store', 'store')->name('products.store');
    Route::get('show/{id}', 'show')->name('products.show');
    Route::get('edit/{id}', 'edit')->name('products.edit');
    Route::put('edit/{id}', 'update')->name('products.update');
    Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
});

// 🌟 Auth Routes

// 🌟 Default Redirect

// 🌟 Static Pages
Route::get('index', function () {
    return view('index');
})->name('index');
Route::get('/admin/profile', function () {
    return view('admin/profile');
})->name('profile');
