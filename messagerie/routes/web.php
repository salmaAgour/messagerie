<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Routes for Admin
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
Route::get('/admin/create', [App\Http\Controllers\Admin\HomeController::class, 'create'])->name('create');
Route::post('/admin/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'store'])->name('store');
Route::get('/admin/dashboard/{id}', [App\Http\Controllers\Admin\HomeController::class, 'show'])->name('show');
Route::delete('/admin/dashboard/{id}', [App\Http\Controllers\Admin\HomeController::class, 'delete'])->name('delete');
Route::POST('/admin/search', [App\Http\Controllers\Admin\HomeController::class, 'search'])->name('search');

//Routes for employee
Route::get('/employee/dashboard', [App\Http\Controllers\Employee\HomeController::class, 'index'])->name('home');
Route::get('/employee/dashboard/create', [App\Http\Controllers\Employee\HomeController::class, 'create'])->name('create');
// Route::post('/employee/dashboard', [App\Http\Controllers\Employee\HomeController::class, 'store'])->name('store');
Route::get('/employee/dashboard/{id}', [App\Http\Controllers\Employee\HomeController::class, 'show'])->name('show');
Route::delete('/employee/dashboard/{id}', [App\Http\Controllers\Employee\HomeController::class, 'delete'])->name('delete');
Route::POST('/employee/search', [App\Http\Controllers\Employee\HomeController::class, 'search'])->name('search');

// Route::resource('user', App\Http\Controllers\MsgCont::class);

Route::get('/admin/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->middleware('role:admin');
Route::get('/employee/dashboard', [App\Http\Controllers\Employee\HomeController::class, 'index'])->middleware('role:employee');

Route::group(['middleware' => ['auth']], function () {
    /**
     * Logout Route
     */
    Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'perform'])->name('logout');
});
