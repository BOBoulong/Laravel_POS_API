<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Category API
Route::get('getAllCategories', [CategoryController::class, 'getAllCategory']);
Route::post('createCategory', [CategoryController::class, 'createCategory']);
Route::get('getCategoryById/{id}', [CategoryController::class, 'getCategoryById']);
Route::put('updateCategoryById/{id}', [CategoryController::class, 'updateCategoryById']);
Route::delete('deleteCategoryById/{id}', [CategoryController::class, 'deleteCategoryById']);

// Product API
Route::get('getAllProducts', [ProductController::class, 'getAllProducts']);
Route::post('createProduct', [ProductController::class, 'createProduct']);
Route::get('getProductById/{id}', [ProductController::class, 'getProductById']);
Route::put('updateProductById/{id}', [ProductController::class, 'updateProductById']);
Route::delete('deleteProductById/{id}', [ProductController::class, 'deleteProduct']);