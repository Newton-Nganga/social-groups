<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScriptController;
use App\Http\Controllers\WhatsAppController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\Admin\FacebookGroupController;
use App\Http\Controllers\Admin\TelegramGroupController;
use App\Http\Controllers\Admin\WhatsAppGroupController;
use Illuminate\Support\Facades\Route;

// Frontend routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/scripts', [ScriptController::class, 'index'])->name('scripts');
Route::get('/whatsapp', [WhatsAppController::class, 'index'])->name('whatsapp');
Route::get('/facebook', [FacebookController::class, 'index'])->name('facebook');
Route::get('/telegram', [TelegramController::class, 'index'])->name('telegram');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/add-group', [GroupController::class, 'create'])->name('groups.create');
Route::post('/add-group', [GroupController::class, 'store'])->name('groups.store');

// For users
Route::get('/facebook', [FacebookGroupController::class, 'userView'])->name('facebook');

// Admin routes
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('login');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth:admin');

// Scripts
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::resource('scripts', ScriptController::class);
    Route::get('/scripts/create', [ScriptController::class, 'create'])->name('admin.scripts.create');
    Route::post('/scripts/store', [ScriptController::class, 'store'])->name('admin.scripts.store');
    Route::get('/scripts', [ScriptController::class, 'index'])->name('admin.scripts.index');
    Route::get('/create-script', [ScriptController::class, 'create'])->name('admin.create_script');
});


// Facebook routes for the admin
Route::prefix('admin')->middleware(['auth:Admin'])->name('admin.')->group(function () {
    Route::resource('facebook', FacebookGroupController::class);
    Route::get('facebook', [FacebookGroupController::class, 'userView'])->name('facebook');
});

// Group controllers
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::get('/groups', [GroupController::class, 'index'])->name('admin.groups.index');
    Route::get('/groups/create', [GroupController::class, 'create'])->name('admin.groups.create');
    Route::post('/groups', [GroupController::class, 'store'])->name('admin.groups.store');
    Route::get('/groups/{id}/edit', [GroupController::class, 'edit'])->name('admin.groups.edit');
    Route::put('/groups/{id}', [GroupController::class, 'update'])->name('admin.groups.update');
    Route::delete('/groups/{id}', [GroupController::class, 'destroy'])->name('admin.groups.destroy');
});



// Analytics
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics.index');
    Route::get('/analytics/{id}/edit', [AnalyticsController::class, 'edit'])->name('analytics.edit');
    Route::put('/analytics/{id}', [AnalyticsController::class, 'update'])->name('analytics.update');
    Route::delete('/analytics/{id}', [AnalyticsController::class, 'destroy'])->name('analytics.destroy');
});

//  Whatsapp
Route::prefix('admin')->middleware(['auth:admin'])->name('admin.')->group(function () {
    Route::resource('whatsapp', WhatsAppGroupController::class);
});

// Facebook
Route::prefix('admin')->middleware(['auth:admin'])->name('admin.')->group(function () {
    Route::resource('facebook', FacebookGroupController::class);
});

// Telegram
Route::prefix('admin')->middleware(['auth:admin'])->name('admin.')->group(function () {
    Route::resource('telegram', TelegramGroupController::class);
});


// Route::middleware(['auth:admin'])->group(function () {
//     Route::get('/admin/analytics', [AnalyticsController::class, 'index'])->name('analytics.index');
//     Route::get('/admin/analytics/{id}/edit', [AnalyticsController::class, 'edit'])->name('analytics.edit');
//     Route::put('/admin/analytics/{id}', [AnalyticsController::class, 'update'])->name('analytics.update');
//     Route::delete('/admin/analytics/{id}', [AnalyticsController::class, 'destroy'])->name('analytics.destroy');
// });

// // WhatsApp
// Route::middleware(['auth:Admin'])->prefix('admin')->name('admin.')->group(function () {
//     Route::resource('whatsapp',WhatsAppGroupController::class);
// });



// Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
//     Route::resource('facebook', FacebookGroupController::class);
// });
// Grouped admin routes with middleware for scripts
// Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
//     Route::get('/scripts/create', [ScriptController::class, 'create'])->name('admin.scripts.create');
//     Route::post('/scripts/store', [ScriptController::class, 'store'])->name('admin.scripts.store');
//     Route::get('/scripts', [ScriptController::class, 'index'])->name('admin.scripts.index');
//     Route::get('/create-script', [ScriptController::class, 'create'])->name('admin.create_script');
// });
