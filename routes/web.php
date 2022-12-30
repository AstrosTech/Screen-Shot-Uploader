<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::middleware('auth:sanctum')->group(function() {
    // Uploads
    Route::get('/uploads', [App\Http\Controllers\UploadController::class, 'index'])->name('uploads');
    Route::get('/uploads/{upload}', [App\Http\Controllers\UploadController::class, 'show'])->name('uploads.show');

    // Tokens
    Route::get('/tokens', [App\Http\Controllers\Auth\TokenController::class, 'index'])->name('tokens');
    Route::get('/tokens/create', [App\Http\Controllers\Auth\TokenController::class, 'create'])->name('tokens.create');
});