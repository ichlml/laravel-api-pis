<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BbmController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function() {
    //logout
    Route::post('/logout', [AuthController::class, 'logout']);
    //bbm
    Route::get('/bbm', [BbmController::class, 'index']);
    Route::post('/bbm', [BbmController::class, 'store']);
    Route::put('/bbm/{id}', [BbmController::class, 'update']);
});
