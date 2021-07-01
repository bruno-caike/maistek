<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('users/change-password', [App\Http\Controllers\UsersController::class, 'indexChangePassword'])->name('users.indexChangePassword');
    Route::put('users/change-password', [App\Http\Controllers\UsersController::class, 'changePassword'])->name('users.changePassword');
    Route::resource('users', App\Http\Controllers\UsersController::class);
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.showProfile');
    Route::resource('pages', App\Http\Controllers\PagesController::class);
    Route::resource('contacts', App\Http\Controllers\ContactController::class);
    Route::resource('news', App\Http\Controllers\NewsController::class);
});
Route::post('contacts', [App\Http\Controllers\ContactController::class, 'store'])->name('contacts.store');
Route::get('/', [App\Http\Controllers\ContentController::class, 'index'])->name('index');