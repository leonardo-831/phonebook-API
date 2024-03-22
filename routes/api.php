<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ContactController;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */

//contacts
Route::apiResource('contacts', ContactController::class);

//phones
Route::put('phones/{phone}', [PhoneController::class, 'update']);
Route::delete('phones/{phone}', [PhoneController::class, 'destroy']);