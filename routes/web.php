<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\ConductoresController;
use App\Http\Controllers\PropietarioController;

Auth::routes();

//PROPIETARIOS RUTAS
Route::get('/', [App\Http\Controllers\PropietarioController::class, 'propietarios'])->name('propietarios');
Route::post('/propietarios', [App\Http\Controllers\PropietarioController::class, 'agregarPropietario'])->name('agregar_propietario');
Route::get('/propietarios/{propietario}', [App\Http\Controllers\PropietarioController::class, 'eliminarPropietario'])->name('eliminar_propietario');
Route::get('/propietarios/editar/{propietario}', [App\Http\Controllers\PropietarioController::class, 'editarPropietario'])->name('editar_propietario');
Route::post('/propietarios/modificar', [App\Http\Controllers\PropietarioController::class, 'modificarPropietario'])->name('modificar_propietario');


// CONDUCTORES RUTAS
Route::get('/conductores', [App\Http\Controllers\ConductoresController::class, 'index'])->name('conductores');
Route::post('/conductores', [App\Http\Controllers\ConductoresController::class, 'agregarConductores'])->name('agregar_conductores');
Route::get('/conductores/{conductor}', [App\Http\Controllers\ConductoresController::class, 'eliminarConductor'])->name('eliminar_conductor');
Route::get('/conductores/editar/{conductor}', [App\Http\Controllers\ConductoresController::class, 'editarConductor'])->name('editar_conductor');
Route::post('/conductores/modificar', [App\Http\Controllers\ConductoresController::class, 'modificarConductor'])->name('modificar_conductor');

// VEHICULOS RUTAS
Route::get('/vehiculos', [App\Http\Controllers\VehiculosController::class, 'index'])->name('vehiculos');
Route::post('/vehiculos', [App\Http\Controllers\VehiculosController::class, 'agregarVehiculo'])->name('agregar_vehiculos');
Route::get('/vehiculos/{vehiculo}', [App\Http\Controllers\VehiculosController::class, 'eliminarVehiculo'])->name('eliminar_vehiculo');
Route::get('/vehiculos/editar/{vehiculo}', [App\Http\Controllers\VehiculosController::class, 'editarVehiculo'])->name('editar_vehiculo');
Route::post('/vehiculos/modificar', [App\Http\Controllers\VehiculosController::class, 'modificarVehiculo'])->name('modificar_vehiculos');
