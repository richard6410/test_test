<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClasssettingController;
use App\Http\Controllers\Admin\CurriculumController;
use App\Http\Controllers\Admin\DeliveryController;


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
//delivery関連
Route::prefix('admin')->group(function () {
    Route::get('/delivery', [DeliveryController::class, 'index'])->name('delivery.index');
    Route::post('/save-delivery', [DeliveryController::class, 'save'])->name('save_delivery');
//curriculum関連
    Route::get('/curriculum_list', [CurriculumController::class, 'index'])->name('curriculum_list');
});
//ヘッダー関連
Route::get('/curriculum_list', [CurriculumController::class, 'index'])->name('curriculum_list');
Route::get('/curriculum_edit', [CurriculumController::class, 'edit'])->name('curriculum_edit');
Route::get('/delivery', [DeliveryController::class, 'index'])->name('delivery');
Route::get('/article_edit', [ArticleController::class, 'edit'])->name('article_edit');
Route::get('/banner_edit', [BannerController::class, 'edit'])->name('banner_edit');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// 授業内容編集
Route::get('/curriculum/{id}/edit', [CurriculumController::class, 'edit'])->name('curriculum_edit');
// 配信日時編集
Route::get('/delivery/{id}/edit', [DeliveryController::class, 'edit'])->name('delivery_edit');
