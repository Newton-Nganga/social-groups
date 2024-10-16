<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\GroupApiController;
use App\Http\Controllers\GroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// API Home Index
Route::get('/home', [ApiController::class, 'index']) ->name('api.home');


// API Analytics - Get all Analytic info collected in storage
Route::get("/analytics",  [ApiController::class, 'analytics'])->name('api.analytics');

// API Users - Get all users data in the storage.
Route::get('/users', [ApiController::class, 'users'])->name('api.users');

// API for Groups
Route::apiResource('groups', GroupApiController::class);

// API Facebook Groups
