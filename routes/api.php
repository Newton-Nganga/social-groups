<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\GroupApiController;
use App\Http\Controllers\Admin\TelegramAPIController;
use App\Http\Controllers\Admin\FacebookAPIController;
use App\Http\Controllers\Admin\WhatsappAPIController;
use App\Http\Controllers\InvestmentApiController;
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


// API FACEBOOK Users  - Get all facebook
Route::get('/facebook',  [ApiController::class, 'facebook'])->name('api.facebook');

// API WhastApp  Users  - Get all facebook
Route::get('/whatsapp',  [ApiController::class, 'whatsapp'])->name('api.whatsapp');


// API Telegram Users  - Get all facebook
Route::get('/telegram',  [ApiController::class, 'telegram'])->name('api.telegram');

// API for Groups
Route::apiResource('groups', GroupApiController::class);

// API for Investments
Route::apiResource('investments', InvestmentApiController::class);


// ADMIN routes
// index
Route::get('/admin', [ApiController::class, 'admin'])->name('admin.api.home');
// API Facebook Groups

// Route::middleware(['auth:admin'])->apiResource('facebook', FacebookApiController::class)->name('api.admin.facebook');
Route::middleware(['auth:admin'])->apiResource('facebook', FacebookAPIController::class);

// API  Whatsapps
Route::prefix('admin')->apiResource('whatsapps', WhatsappAPIController::class);

// API  Telegram
Route::apiResource('telegrams', TelegramAPIController::class);
