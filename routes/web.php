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
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('admin/personas', function () {
    return view('admin/personas');
})->name('personas');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/familias', function () {
    return view('admin/familias');
})->name('familias');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/habitad', function () {
    return view('admin/habitad');
})->name('habitad');
