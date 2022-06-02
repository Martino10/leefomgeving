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

Route::middleware(['auth'])->group(function () {
    // Routes waar je ingelogd voor moet zijn
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/logout', '\App\Http\Controllers\LogoutController@perform')->name('logout.perform');
    Route::get('/data', [\App\Http\Controllers\DataController::class, 'index'])->name('data');
    Route::get('/data/{location_name}', [\App\Http\Controllers\DataController::class, 'detaildata'])->name('detaildata');
    Route::post('/data/add_device', [\App\Http\Controllers\DataController::class, 'storedevice'])->name('storedevice');
});

Route::get('/', function () {
    return view('welcome');
});



require __DIR__.'/auth.php';
