<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
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

// User API
Route::get('getAllUsers', [UserController::class, 'getAllUsers']);
Route::post('createUser', [UserController::class, 'createUser']);
Route::get('getUserById/{id}', [UserController::class, 'getUserById']);
Route::put('updateUserById/{id}', [UserController::class, 'updateUserById']);
Route::delete('deleteUserById/{id}', [UserController::class, 'deleteUserById']);

// Customer API
Route::get('getAllCustomers', [CustomerController::class, 'getAllCustomers']);
Route::post('createCustomer', [CustomerController::class, 'createCustomer']);
Route::get('getCustomerById/{id}', [CustomerController::class, 'getCustomerById']);
Route::put('updateCustomerById/{id}', [CustomerController::class, 'updateCustomerById']);
Route::delete('deleteCustomerById/{id}', [CustomerController::class, 'deleteCustomerById']);

// Category API
Route::get('getAllCategories', [CategoryController::class, 'getAllCategories']);
Route::post('createCategory', [CategoryController::class, 'createCategory']);
Route::get('getCategoryById/{id}', [CategoryController::class, 'getCategoryById']);
Route::put('updateCategoryById/{id}', [CategoryController::class, 'updateCategoryById']);
Route::delete('deleteCategoryById/{id}', [CategoryController::class, 'deleteCategoryById']);

// Product API
Route::get('getAllProducts', [ProductController::class, 'getAllProducts']);
Route::post('createProduct', [ProductController::class, 'createProduct']);
Route::get('getProductById/{id}', [ProductController::class, 'getProductById']);
Route::put('updateProductById/{id}', [ProductController::class, 'updateProductById']);
Route::delete('deleteProductById/{id}', [ProductController::class, 'deleteProductById']);
