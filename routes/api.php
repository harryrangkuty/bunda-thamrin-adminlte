<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PatientApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/patients', [PatientApiController::class, 'index']);
Route::get('/patients/registered', [PatientApiController::class, 'registered']);