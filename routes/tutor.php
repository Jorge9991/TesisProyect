<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\InformeFinalController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\PostulationController;
use App\Http\Controllers\RecursoController;
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
Route::resource('recursos',RecursoController::class )->names('tutor.recurso');
Route::get('recursos_descargar',[RecursoController::class,'descargar'])->name('tutor.recurso.descargar');
Route::get('asignaciones',[AsignacionController::class,'index'])->name('asignacion.index');
Route::get('asignacion/{postulacion}',[AsignacionController::class,'asignar'])->name('asignacion.asignar');
Route::post('asignar/{postulacion}',[AsignacionController::class,'asignar_tutor'])->name('asignacion.asignar_tutor');
Route::get('asignaciones_tutor',[AsignacionController::class,'asignaciontutor'])->name('asignacion.asignaciontutor');
Route::get('detalle/{asignacion}',[AsignacionController::class,'detalle'])->name('asignacion.detalle');
Route::post('aceptar_asignacion/{asignation}',[AsignacionController::class,'aceptar_asignacion'])->name('asignacion.aceptar_asignacion');
Route::post('rechazar_asignacion/{asignation}',[AsignacionController::class,'rechazar_asignacion'])->name('asignacion.rechazar_asignacion');
Route::resource('activity',ActivityController::class )->names('activity');
Route::resource('information',InformationController::class )->names('information');
Route::get('informe',[InformeFinalController::class,'index'])->name('informe.index');
Route::get('informefinal',[InformeFinalController::class,'informe'])->name('informe.informe');
Route::post('informe_create',[InformeFinalController::class,'create'])->name('informe.create');
Route::get('informe_final/{informefinal}',[InformeFinalController::class,'opcion'])->name('informe.opcion');
Route::post('informe_final_aprobar/{informefinal}',[InformeFinalController::class,'aprobar'])->name('informe.aprobar');
Route::post('informe_final_noaprobar/{informefinal}',[InformeFinalController::class,'noaprobar'])->name('informe.noaprobar');
Route::get('informe_final_cancelar/{informefinal}',[InformeFinalController::class,'cancelar'])->name('informe.cancelar');
Route::get('revision',[InformeFinalController::class,'revision'])->name('informe.revision');
Route::get('revision_detalle/{informefinal}',[InformeFinalController::class,'revision_detalle'])->name('informe.revision_detalle');
Route::post('informeaprobado/{informefinal}',[InformeFinalController::class,'aprobado'])->name('informe.aprobado');


