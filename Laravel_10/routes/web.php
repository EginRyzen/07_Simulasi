<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\NootifikasiController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::resource('/', UserController::class);
Route::post('login', [UserController::class, 'login']);
Route::get('logout', [UserController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::resource('timeline', GaleryController::class);

    Route::resource('admin', AdminController::class);
    Route::get('updateStatus/{id}', [AdminController::class, 'updatestatus']);

    Route::resource('notifikasi', NootifikasiController::class);
    Route::post('accStatus', [NootifikasiController::class, 'accStatus']);
});
