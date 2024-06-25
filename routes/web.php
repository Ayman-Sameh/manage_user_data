<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDataController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware(['auth' , AdminMiddleware::class])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile'    , 'edit')->name('profile.edit');
        Route::patch('/profile'  , 'update')->name('profile.update');
        Route::delete('/profile' , 'destroy')->name('profile.destroy');
    });

    Route::controller(UserDataController::class)->group(function() {
        Route::get('user_data' , 'index')->name('user_data');
        Route::post('import'   , 'import')->name('import');
        Route::get('export'    , 'export')->name('export');
    });


});







require __DIR__.'/auth.php';
