<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::namespace('Admin')
// 	->group(function () {
//     Route::get('/', function () {
//         return view('admin.login');
//     })
//     ->name('login')
//     ->middleware('guest');

//     Route::resource('dashboard','DashboardController');
//     Route::resource('categories','CategoryController');

// });

Route::prefix('admin')
        ->name('admin.')
        ->group( function() {
    // Route::get('/', function () {
    //     return view('auth.login');
    // })
    // ->name('login')
    // ->middleware('guest');

    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('users',App\Http\Controllers\Admin\UserController::class);
    Route::resource('colleges',App\Http\Controllers\Admin\CollegeController::class);
    Route::resource('categories',App\Http\Controllers\Admin\CategoryController::class);
});
