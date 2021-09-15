<?php

use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\PostulationController;
use Illuminate\Support\Facades\Route;

Route::resource('convenio',ConvenioController::class )->names('tutor.convenio');
Route::resource('oferta_cupo',OfertaController::class )->names('tutor.oferta_cupo');
Route::resource('postulacion', PostulationController::class)->only(['index'])->names('egresado.postulation');
Route::get('cancelar_postulacion',[PostulationController::class,'destroy'])->name('egresado.postulation.destroy');
Route::get('postular/{postulation}',[PostulationController::class,'postular'])->name('egresado.postulation.postular');