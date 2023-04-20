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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
Route::get('/home/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');
Route::delete('/home/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete');
Route::POST('/search',[App\Http\Controllers\HomeController::class,'search'])->name('search');

Route::resource('user', App\Http\Controllers\MsgCont::class);

Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout',[App\Http\Controllers\LogoutController::class, 'perform'])->name('logout');
 });
