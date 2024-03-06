<?php

use App\Http\Controllers\Api\ActionLogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Auth controller
Route::post('user/login', [AuthController::class, 'login']);
Route::post('user/register', [AuthController::class, 'register']);

// category controller
Route::get('user/get/category', [CategoryController::class, 'getCategory']);
Route::post('searchCategory', [CategoryController::class, 'searchCategory']);

// post controller
Route::post('user/get/post/search', [PostController::class, 'searchPost']);
Route::get('user/get/post', [PostController::class, 'getPost']);
Route::post('user/get/post/detail', [PostController::class, 'detailPost']);

//action log contorller
Route::post('actionLog', [ActionLogController::class, 'getActionLog']);
