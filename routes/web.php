<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Personasdatoscomponente;

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

Route::middleware(['auth:sanctum', 'verified'])->get('admin/persona_datos/{persona_id}', Personasdatoscomponente::class)->name('persona_datos');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/familias', function () {
    return view('admin/familias');
})->name('familias');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/nuevafamilia', function () {
    return view('admin/nuevafamilia');
})->name('nuevafamilia');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/direcciones', function () {
    return view('admin/direcciones');
})->name('direcciones');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/habitad', function () {
    return view('admin/habitad');
})->name('habitad');
