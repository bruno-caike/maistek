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
Route::get('/tecnologia-da-informacao', [App\Http\Controllers\PagesSecondariesController::class, 'informationTechnology'])->name('informationTechnology.index');
Route::get('/design', [App\Http\Controllers\PagesSecondariesController::class, 'design'])->name('design.index');
Route::get('/ux', [App\Http\Controllers\PagesSecondariesController::class, 'ux'])->name('ux.index');
Route::get('/ui', [App\Http\Controllers\PagesSecondariesController::class, 'ui'])->name('ui.index');
Route::get('/marketing', [App\Http\Controllers\PagesSecondariesController::class, 'marketing'])->name('marketing.index');
Route::get('/servidor-web', [App\Http\Controllers\PagesSecondariesController::class, 'webServer'])->name('webServer.index');
Route::get('/programacao', [App\Http\Controllers\PagesSecondariesController::class, 'programming'])->name('programming.index');
Route::get('/fale-conosco', [App\Http\Controllers\PagesSecondariesController::class, 'contactUs'])->name('contactUs.index');
Route::post('contactsUs', [App\Http\Controllers\PagesSecondariesController::class, 'contactsUsStore'])->name('contactsUs.store');

Route::get('/noticias', [App\Http\Controllers\NewsSiteController::class, 'allNews'])->name('allNews.index');
Route::get('/noticias/{id}/{slug}', [App\Http\Controllers\NewsSiteController::class, 'new'])->name('new.show');