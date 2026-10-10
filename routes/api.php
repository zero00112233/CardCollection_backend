<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Api\CardFilterController;



// Bejelentkezett felhasználó adatai
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::post('/register', [RegisteredUserController::class, 'store']);
// Kártyák lekérése – mindenki számára elérhető
Route::get('/cards', [CardController::class, 'index']);
Route::get('/cards/{card_id}', [CardController::class, 'show']);
Route::post('/cards/filter', CardFilterController::class);

// Kártyák módosítása – csak bejelentkezett felhasználónak
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
    Route::post('/cards', [CardController::class, 'store']);
    Route::put('/cards/{card_id}', [CardController::class, 'update']);
    Route::patch('/cards/{card_id}', [CardController::class, 'update']);
    Route::delete('/cards/{card_id}', [CardController::class, 'destroy']);
});