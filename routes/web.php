<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CarPartController;
use App\Http\Controllers\ServiceOrderController;
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


Route::resource('/cars', CarController::class)->name('*','cars');
Route::resource('/carParts', CarPartController::class)->name('*','carParts');
Route::resource('/serviceOrders', ServiceOrderController::class)->name('*','serviceOrders');
