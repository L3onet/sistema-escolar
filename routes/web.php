<?php

use App\Http\Controllers\AseguradoraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadTematicaController;
use App\Http\Controllers\PeriodoEscolarController;
use App\Http\Controllers\AlumnoController;

Route::get('/', function () {
    return view('inicio');
});
Route::resource('aseguradoras', AseguradoraController::class);

// Rutas para Unidades Temáticas
// Nota: Usamos dos parámetros porque tenemos llave compuesta
Route::get('/unidades-tematicas', [UnidadTematicaController::class, 'index'])
    ->name('unidades_tematicas.index');

Route::get('/unidades-tematicas/create', [UnidadTematicaController::class, 'create'])
    ->name('unidades_tematicas.create');

Route::post('/unidades-tematicas', [UnidadTematicaController::class, 'store'])
    ->name('unidades_tematicas.store');

Route::get('/unidades-tematicas/{no_de_unidad}/{materia}', [UnidadTematicaController::class, 'show'])
    ->name('unidades_tematicas.show');

Route::get('/unidades-tematicas/{no_de_unidad}/{materia}/edit', [UnidadTematicaController::class, 'edit'])
    ->name('unidades_tematicas.edit');

Route::put('/unidades-tematicas/{no_de_unidad}/{materia}', [UnidadTematicaController::class, 'update'])
    ->name('unidades_tematicas.update');

Route::delete('/unidades-tematicas/{no_de_unidad}/{materia}', [UnidadTematicaController::class, 'destroy'])
    ->name('unidades_tematicas.destroy');

Route::resource('periodos-escolares', PeriodoEscolarController::class);

// Rutas para Alumnos
// Nota: La clave primaria es 'no_de_control' (string), no 'id'
Route::resource('alumnos', AlumnoController::class)->parameters([
    'alumnos' => 'no_de_control'
]);

// Rutas adicionales para Alumnos
Route::get('alumnos-export', [AlumnoController::class, 'export'])
    ->name('alumnos.export');

Route::get('alumnos-clear-filters', [AlumnoController::class, 'clearFilters'])
    ->name('alumnos.clearFilters');

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
