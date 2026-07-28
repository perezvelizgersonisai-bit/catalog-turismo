<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TouristSiteController;

Route::get('/', [TouristSiteController::class, 'index'])->name('tourist_sites.index');
Route::get('/destino/{id}', [TouristSiteController::class, 'show'])->name('tourist_sites.show');
Route::post('/contacto', [TouristSiteController::class, 'submitContact'])->name('tourist_sites.contact');
