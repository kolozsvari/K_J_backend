<?php

use App\Http\Controllers\IngatlanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/ingatlan', [IngatlanController::class, 'Index']);
Route::post('/ingatlan', [IngatlanController::class, 'Store']);
Route::delete('/ingatlan/{id}', [IngatlanController::class, 'destroy']);
