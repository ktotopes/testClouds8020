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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    Route::get('/car', [\App\Http\Controllers\CarController::class, 'index'])->name('car');
    Route::get('/car-park', [\App\Http\Controllers\CarParkController::class, 'index'])->name('car-park');
    Route::get('/park-view/{carPark}', [\App\Http\Controllers\CarParkController::class, 'edit'])->name('park-view');
});



