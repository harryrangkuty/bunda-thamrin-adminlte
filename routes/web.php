<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return view('welcome');
});

// AUTHENTICATED USER
Route::middleware('auth')->group(function () {
    // DASHBOARD
    Route::view('/dashboard', 'pages.dashboard')->name('dashboard');
    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // PASIEN
    Route::resource('patients', PatientController::class);
    // PENDAFTARAN
    Route::resource('registrations', RegistrationController::class);   
    Route::get('/registrations/export/pdf', [RegistrationController::class, 'exportPdf'])->name('registrations.export.pdf');
    Route::get('/registrations/export/excel', [RegistrationController::class, 'exportExcel'])->name('registrations.export.excel'); 
});

require __DIR__.'/auth.php';
