<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

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

// 管理
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'admin']);
});
Route::get('/admin/search', [AdminController::class, 'search']);
Route::post('/admin/delete', [AdminController::class, 'delete']);

// お問い合わせフォーム
Route::get('/', [ContactController::class, 'index']);
Route::post('/', [ContactController::class, 'contact']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);
