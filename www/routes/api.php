<?php

declare(strict_types=1);

use App\City\Infra\Controllers\CreateCityController;
use App\City\Infra\Controllers\FindCityByCriteriaController;
use Illuminate\Support\Facades\Route;

Route::post('/city/create', [ CreateCityController::class, 'create' ]);
Route::get('/city/search', [ FindCityByCriteriaController::class, 'find' ]);
