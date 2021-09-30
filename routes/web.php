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
Route::post('/state', [App\Http\Controllers\HomeController::class, 'getState'])->name('get.state');

Route::prefix('admin')
    ->name('admin.')
    ->group( function() {
        Route::get('/', function () {
            return view('auth.login');
        })
        ->name('login')
        ->middleware('guest');
    Route::get('/change-password',[App\Http\Controllers\Admin\ChangePasswordController::class, 'index'])->name('change-password.index');
    Route::post('/change-password',[App\Http\Controllers\Admin\ChangePasswordController::class, 'store'])->name('change-password.store');
    Route::get('/state',[App\Http\Controllers\Admin\UserController::class, 'getState'])->name('get.state');
    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('users',App\Http\Controllers\Admin\UserController::class);
    Route::resource('sub-admins',App\Http\Controllers\Admin\SubAdminController::class);
    Route::resource('colleges',App\Http\Controllers\Admin\CollegeController::class);
    Route::resource('categories',App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('college-type',App\Http\Controllers\Admin\CollegeTypeController::class);
    Route::get('College-ceate', function(){
        return view('admin.college.create-new');
    });
});

Route::prefix('college')
    ->name('college.')
    ->group( function() {
    Route::get('/', function () {
        return view('auth.login');
    })
    ->name('login')
    ->middleware('guest');
    Route::get('/change-password',[App\Http\Controllers\College\ChangePasswordController::class, 'index'])->name('change-password.index');
    Route::post('/change-password',[App\Http\Controllers\College\ChangePasswordController::class, 'store'])->name('change-password.store');
    Route::get('dashboard',[App\Http\Controllers\College\DashboardController::class, 'index'])->name('dashboard.index');
});
