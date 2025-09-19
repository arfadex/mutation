<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Auth::routes(['register' => false]);

// Default route - show welcome page or redirect based on auth
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('welcome');
});

// Dark mode toggle
Route::post('/toggle-dark-mode', function () {
    session(['dark_mode' => !session('dark_mode', true)]);
    return response()->json(['dark_mode' => session('dark_mode')]);
})->name('toggle.dark.mode');

// Public routes
Route::post('/demande/add-lycee', [DemandeController::class, 'addLycee'])->name('demande.addLycee');
Route::get('/demandes/user/{username}', [DemandeController::class, 'countDemandesByUsername']);

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    // Demande routes
    Route::post('/demande', [DemandeController::class, 'store'])->name('demande.store');
    Route::get('/demande', [DemandeController::class, 'create'])->name('demande.create');
    Route::get('/demande/{id}', [DemandeController::class, 'show'])->name('demande.show');
    Route::get('/latest-mutation', [DemandeController::class, 'showLatestMutation'])->name('demande.latestMutation');
    
    // Admin routes
    Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/demandes', [AdminController::class, 'demandes'])->name('demandes');
        Route::get('/demandes/{id}', [AdminController::class, 'showDemande'])->name('demande.show');
        Route::patch('/demandes/{id}/status', [AdminController::class, 'updateDemandeStatus'])->name('demande.status');
        Route::get('/teachers', [AdminController::class, 'teachers'])->name('teachers');
        Route::get('/analytics', [AdminController::class, 'analytics'])->name('analytics');
    });
});

Route::get('/test', function () {
    return view('service.test');
})->name('service.test');

