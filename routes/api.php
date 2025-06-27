<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\ApiController;

// API Status and Information
Route::get('/status', [ApiController::class, 'status']);
Route::get('/health', [ApiController::class, 'health']);
Route::get('/statistics', [ApiController::class, 'statistics']);

// Patient CRUD endpoints
Route::get('/patients', [PatientController::class, 'index']);
Route::post('/patients', [PatientController::class, 'store']);
Route::get('/patients/{id}', [PatientController::class, 'show']);
Route::put('/patients/{id}', [PatientController::class, 'update']);
Route::delete('/patients/{id}', [PatientController::class, 'destroy']);
