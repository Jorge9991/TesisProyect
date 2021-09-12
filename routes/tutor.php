<?php

use App\Http\Controllers\ConvenioController;
use Illuminate\Support\Facades\Route;

Route::resource('convenio',ConvenioController::class )->names('tutor.convenio');