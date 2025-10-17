<?php

use App\Http\Controllers\AseguradoraController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('inicio');
});
Route::resource('aseguradoras', AseguradoraController::class);

/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/
