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
Route::get('/admin/create', [App\Http\Controllers\Admin\HomeController::class, 'create'])->name('createA');
Route::post('/admin/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'store'])->name('storeA');
Route::POST('/admin/search', [App\Http\Controllers\Admin\HomeController::class, 'search'])->name('searchA');


//Routes for employee
Route::get('/employee/dashboard', [App\Http\Controllers\Employee\HomeController::class, 'index'])->name('home');
Route::get('/employee/dashboard/create', [App\Http\Controllers\Employee\HomeController::class, 'create'])->name('create');
Route::get('/employee/dashboard/{id}', [App\Http\Controllers\Employee\HomeController::class, 'show'])->name('show');
Route::put('/employee/dashboard/{id}', [App\Http\Controllers\Employee\HomeController::class, 'update'])->name('update');
Route::POST('/employee/search', [App\Http\Controllers\Employee\HomeController::class, 'search'])->name('search');

// Route::resource('user', App\Http\Controllers\MsgCont::class);

Route::get('/admin/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->middleware('role:admin');
// Route::get('/admin/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('homeA')->middleware('role:admin');
Route::get('/employee/dashboard', [App\Http\Controllers\Employee\HomeController::class, 'index'])->middleware('role:employee');

Route::group(['middleware' => ['auth']], function () {
    /**
     * Logout Route
     */
    Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'perform'])->name('logout');
});
