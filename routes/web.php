<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StarController;

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

Route::get('/create', function () {
    return view('stars.create');
});

Route::delete('/stars', function () {
    return view('stars.index');
});
Route::put('/stars', function () {
    return view('stars.index');
});

Route::resource('stars', StarController::class)->except(['show']);

Route::redirect('/', route('stars.index'))->name('dashboard');
