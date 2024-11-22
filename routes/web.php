<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\AnimalController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('api/animals', [AnimalController::class, 'index']);
Route::get('api/animals/{id}', [AnimalController::class, 'show']);
Route::post('api/animals', [AnimalController::class, 'store']);
Route::put('api/animals/{id}', [AnimalController::class, 'update']);
Route::delete('api/animals/{id}', [AnimalController::class, 'destroy']);


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login')
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});

require __DIR__.'/auth.php';
