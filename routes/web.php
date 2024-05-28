<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CurriculumController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\LoginController;


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

Route::get('/', function () {
    return view('admin.layouts.curriculum_list');
});
//仮
Route::get('/', [CurriculumController::class, 'index'])->name('curriculum_list');

// 管理パネル関連
Route::prefix('admin')->group(function () {
    // Delivery関連
    Route::get('/delivery', [DeliveryController::class, 'index'])->name('delivery.index');
    Route::post('/save-delivery', [DeliveryController::class, 'save'])->name('save_delivery');
    Route::get('/delivery/{id}/edit', [DeliveryController::class, 'edit'])->name('delivery.edit');
    Route::put('/delivery/{id}', [DeliveryController::class, 'update'])->name('delivery.update');

    // Curriculum関連
    Route::get('/curriculum_list', [CurriculumController::class, 'index'])->name('curriculum_list');
    Route::get('/curriculum/{id}/edit', [CurriculumController::class, 'edit'])->name('curriculum.edit');
    Route::put('/curriculum/{id}', [CurriculumController::class, 'update'])->name('curriculum.update');

    // Article関連
    Route::get('/article_edit', [ArticleController::class, 'edit'])->name('article_edit');

    // Banner関連
    Route::get('/banner_edit', [BannerController::class, 'edit'])->name('banner_edit');
});

// ログイン関連
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');