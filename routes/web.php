<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TrendPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    #profile
    Route::get('/dashboard', [ProfileController::class, 'index'])->name('admin#profile');
    Route::post('admin/profile/update', [ProfileController::class, 'updateAdminProfile'])->name('admin#profileUpdate');
    Route::get('admin/password/change', [ProfileController::class, 'passwordChnage'])->name('admin#passwordChangePage');
    Route::post('admin/change/password', [ProfileController::class, 'changePassword'])->name('admin#changePassword');
    #category
    Route::get('admin/category', [CategoryController::class, 'index'])->name('admin#category');
    Route::post('admin/category/create', [CategoryController::class, 'categoryCreate'])->name('category#create');
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category#delete');
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category#edit');
    Route::post('admin/category/edit/{id}', [CategoryController::class, 'categoryUpdate'])->name('category#update');
    Route::post('admin/category', [CategoryController::class, 'categorySearch'])->name('category#search');

    #list
    Route::get('admin/list', [ListController::class, 'index'])->name('admin#list');
    Route::get('admin/delete/{id}', [ListController::class, 'accountDelete'])->name('admin#delete');
    Route::post('admin/list', [ListController::class, 'accountSearch'])->name('admin#search');

    #post
    Route::get('admin/post', [PostController::class, 'index'])->name('admin#post');

    #trendPost
    Route::get('admin/trend_post', [TrendPostController::class, 'index'])->name('admin#trendPost');
});
