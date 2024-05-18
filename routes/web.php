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

// Route::get('/', function () {
//     return view('admin.layouts.delivery');
// });

Route::get('/', function () {
    return view('admin.layouts.curriculum_edit');
});
//delivery関連
Route::prefix('admin')->group(function () {
    Route::get('/delivery', [DeliveryController::class, 'index'])->name('delivery.index');
    Route::post('/save-delivery', [DeliveryController::class, 'save'])->name('save_delivery');
    //curriculum関連
    Route::get('/curriculums', [CurriculumController::class, 'index'])->name('admin.curriculums.index');
    Route::get('/curriculums/create', [CurriculumController::class, 'create'])->name('admin.curriculums.create');
    Route::post('/curriculums', [CurriculumController::class, 'store'])->name('admin.curriculums.store');
});
//ヘッダー関連
Route::get('/curriculum_edit', [CurriculumController::class, 'index'])->name('curriculum_edit');
Route::get('/delivery', [DeliveryController::class, 'index'])->name('delivery');
Route::get('/article_edit', [ArticleController::class, 'edit'])->name('article_edit');
Route::get('/banner_edit', [BannerController::class, 'edit'])->name('banner_edit');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Route::get('/list', [App\Http\Controllers\ArticleController::class, 'showList'])->name('list');

// // フォーム表示
// Route::get('/classsetting', [ClasssetteigController::class, 'create'])->name('course.create');
// // フォーム送信処理
// Route::post('/classsetting', [ClassSettingController::class, 'store'])->name('classsetting.store');

// Route::get('/curriculums', [CurriculumController::class, 'index'])->name('curriculums.index');

// Route::get('/delivery/create/{curriculum}', [DeliveryController::class, 'create'])->name('delivery.create');
// Route::post('/delivery/store', [DeliveryController::class, 'store'])->name('delivery.store');

// // 授業管理
// Route::get('/admin/auth/curriculum_edit', [App\Http\Controllers\Admin\Auth\CurriculumController::class, 'edit'])->name('curriculum_edit');

// // お知らせ管理
// Route::get('/article_edit', [ArticleController::class, 'edit'])->name('article_edit');

// // バナー管理
// Route::get('/banner_edit', [BannerController::class, 'edit'])->name('banner_edit');

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Route::post('/save-delivery', [DeliveryController::class, 'save'])->name('save_delivery');
// Route::get('/curriculum-list', 'App\Http\Controllers\CurriculumController@index')->name('curriculum_list');
// Route::get('/curriculum-list', 'CurriculumController@index')->name('curriculum_list');

// Route::get('/delivery', 'App\Http\Controllers\DeliveryController@index')->name('delivery');
// Route::get('/some-path', 'DeliveryController@index')->name('delivery');
// Route::get('/delivery', function () {
//     return view('admin.layouts.delivery');
// })->name('delivery');

// Route::get('/delivery', [DeliveryController::class, 'index'])->name('delivery');

// Route::get('/curriculums', 'App\Http\Controllers\Admin\CurriculumController@index');
// Route::get('/curriculum-list', 'CurriculumController@index')->name('curriculum-list');
