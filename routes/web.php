<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::redirect('/', '/login');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/demande', [DemandeController::class, 'store'])->name('demande.store');
    Route::get('/demande', [DemandeController::class, 'create'])->name('demande.create');
    Route::get('/demande/{id}', [DemandeController::class, 'show'])->name('demande.show');
    Route::get('/latest-mutation', [DemandeController::class, 'showLatestMutation'])->name('demande.latestMutation');
});

Route::post('/demande/add-lycee', [DemandeController::class, 'addLycee'])->name('demande.addLycee');
Route::get('/demandes/user/{username}', [DemandeController::class, 'countDemandesByUsername']);

Route::get('/test', function () {
    return view('service.test');
})->name('service.test');

