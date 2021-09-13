<?php

use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\OfertaController;
use Illuminate\Support\Facades\Route;

Route::resource('convenio',ConvenioController::class )->names('tutor.convenio');
Route::resource('oferta_cupo',OfertaController::class )->names('tutor.oferta_cupo');