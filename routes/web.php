<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TrendPostController;
use PHPUnit\Framework\Attributes\PostCondition;

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

    Route::get('/dashboard', [ProfileController::class, 'index'])->name('admin#profile');

    Route::prefix('admin/')->group(function () {
        #profile
        Route::post('profile/update', [ProfileController::class, 'updateAdminProfile'])->name('admin#profileUpdate');
        Route::get('password/change', [ProfileController::class, 'passwordChnage'])->name('admin#passwordChangePage');
        Route::post('change/password', [ProfileController::class, 'changePassword'])->name('admin#changePassword');

        #category
        Route::get('category', [CategoryController::class, 'index'])->name('admin#category');
        Route::post('category/create', [CategoryController::class, 'categoryCreate'])->name('category#create');
        Route::get('category/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category#delete');
        Route::get('category/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category#edit');
        Route::post('category/edit', [CategoryController::class, 'categoryUpdate'])->name('category#update');
        Route::post('category', [CategoryController::class, 'categorySearch'])->name('category#search');

        #list
        Route::get('list', [ListController::class, 'index'])->name('admin#list');
        Route::get('delete/{id}', [ListController::class, 'accountDelete'])->name('admin#delete');
        Route::post('list', [ListController::class, 'accountSearch'])->name('admin#search');

        #post
        Route::get('post', [PostController::class, 'index'])->name('admin#post');
        Route::post('post/create', [PostController::class, 'postCreate'])->name('post#create');
        Route::get('post/delete/{id}', [PostController::class, 'postDelete'])->name('post#delete');
        Route::get('post/edit/{id}', [PostController::class, 'postEdit'])->name('post#edit');
        Route::post('post/update', [PostController::class, 'postUpdate'])->name('post#update');
        Route::post('post/search', [PostController::class, 'postSearch'])->name('post#search');
        
        #trendPost
        Route::get('trend_post', [TrendPostController::class, 'index'])->name('admin#trendPost');
        Route::get('trend/post/detail/{id}', [TrendPostController::class, 'getData'])->name('post#detail');
    });
});
