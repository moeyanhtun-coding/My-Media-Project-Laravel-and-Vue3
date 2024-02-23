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

    #category
    Route::get('admin/category', [CategoryController::class, 'index'])->name('admin#category');

    #list
    Route::get('admin/list', [ListController::class, 'index'])->name('admin#list');

    #post
    Route::get('admin/post', [PostController::class, 'index'])->name('admin#post');

    #trendPost
    Route::get('admin/trend_post', [TrendPostController::class, 'index'])->name('admin#trendPost');
});