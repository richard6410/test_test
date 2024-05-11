<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClasssettingController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\DeliveryController;


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
    return view('admin.layouts.delivery');
});

Route::get('/list', [App\Http\Controllers\ArticleController::class, 'showList'])->name('list');

// フォーム表示
Route::get('/classsetting', [ClasssetteigController::class, 'create'])->name('course.create');
// フォーム送信処理
Route::post('/classsetting', [ClassSettingController::class, 'store'])->name('classsetting.store');

Route::get('/curriculums', [CurriculumController::class, 'index'])->name('curriculums.index');

Route::get('/delivery/create/{curriculum}', [DeliveryController::class, 'create'])->name('delivery.create');
Route::post('/delivery/store', [DeliveryController::class, 'store'])->name('delivery.store');

// 授業管理
Route::get('/admin/auth/curriculum_edit', [App\Http\Controllers\Admin\Auth\CurriculumController::class, 'edit'])->name('curriculum_edit');

// お知らせ管理
Route::get('/article_edit', [ArticleController::class, 'edit'])->name('article_edit');

// バナー管理
Route::get('/banner_edit', [BannerController::class, 'edit'])->name('banner_edit');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/save-delivery', [DeliveryController::class, 'save'])->name('save_delivery');
