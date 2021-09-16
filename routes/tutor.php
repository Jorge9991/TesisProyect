<?php

use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\PostulationController;
use Illuminate\Support\Facades\Route;

Route::resource('convenio',ConvenioController::class )->names('tutor.convenio');
Route::resource('oferta_cupo',OfertaController::class )->names('tutor.oferta_cupo');
Route::get('postulacion',[PostulationController::class,'index'])->name('egresado.postulation.index');
Route::get('cancelar',[PostulationController::class,'destroy'])->name('egresado.postulation.destroy');
Route::get('postular/{postulation}',[PostulationController::class,'postular'])->name('egresado.postulation.postular');
Route::get('postulaciones',[PostulationController::class,'postulaciones'])->name('egresado.postulation.postulaciones');
Route::get('rechazar/{postulation}',[PostulationController::class,'rechazar'])->name('egresado.postulation.rechazar');
Route::get('aprobar/{postulation}',[PostulationController::class,'aprobar'])->name('egresado.postulation.aprobar');
Route::put('aprobado/{postulation}',[PostulationController::class,'aprobado'])->name('egresado.postulation.aprobado');
Route::get('cancelar_postulacion/{postulation}',[PostulationController::class,'cancelar_postulacion'])->name('egresado.postulation.cancelar_postulacion');