<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BackendController;



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




Route::get('/', function () {
    return view('welcome');
});

Route::controller(FrontendController::class)->group(function(){
    Route::get('/', 'home')->name('home');
    Route::any('/user/login', 'user_login');
    Route::any('/new-account', 'new_account');
    Route::any('/user/register', 'user_register')->name('user_register');
    Route::get('/user/forgot-password', 'user_forgot_password')->name('user.forgot.password');
    Route::any('/user/reset-password', 'user_reset_password')->name('user.reset.password');
    Route::get('/user/update-password/{id}', 'user_update_password')->name('user.update.password');
    Route::post('/user/updated-password', 'user_updated_password');
    Route::get('/error-404', 'error_404')->name('error.404');
    Route::get('/error-403', 'error_403')->name('error.403');





    Route::middleware(['auth', 'verified','role:user'])->group(function () {
        Route::get('/user-logout', 'user_logout')->name('user_logout');
    });

});

Route::controller(BackendController::class)->group(function(){
    Route::middleware(['auth', 'verified','role:admin'])->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/admin-logout', 'admin_logout')->name('admin_logout');
    });
});

