<?php

use App\Http\Controllers\DataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/sheet-data', [DataController::class, 'getSheetData']);
Route::get('/sheet-header', [DataController::class, 'getSheetHeaders']);
