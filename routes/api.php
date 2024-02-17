<?php

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\Authenticate;


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

Route::get('/user', function (Request $request) {
    return $request->user();
});

// Auth
Route::post('login',[UserAuthController::class,'login']);
Route::delete('logout',[UserAuthController::class,'logout'])->middleware('auth:sanctum');

// User API
Route::get('user', [UserController::class, 'getAllUsers']);
Route::post('user', [UserController::class, 'createUser']);
Route::get('user/{id}', [UserController::class, 'getUserById']);
Route::put('user/{id}', [UserController::class, 'updateUserById']);
Route::delete('user/{id}', [UserController::class, 'deleteUserById']);

// Customer API
Route::get('customer', [CustomerController::class, 'getAllCustomers']);
Route::post('customer', [CustomerController::class, 'createCustomer']);
Route::get('customer/{id}', [CustomerController::class, 'getCustomerById']);
Route::put('customer/{id}', [CustomerController::class, 'updateCustomerById']);
Route::delete('customer/{id}', [CustomerController::class, 'deleteCustomerById']);

// Category API
Route::get('category', [CategoryController::class, 'getAllCategories']);
Route::post('category', [CategoryController::class, 'createCategory']);
Route::get('category/{id}', [CategoryController::class, 'getCategoryById']);
Route::put('category/{id}', [CategoryController::class, 'updateCategoryById']);
Route::delete('category/{id}', [CategoryController::class, 'deleteCategoryById']);

// Product API
Route::get('product', [ProductController::class, 'getAllProducts']);
Route::post('product', [ProductController::class, 'createProduct']);
Route::get('product/{id}', [ProductController::class, 'getProductById']);
Route::put('product/{id}', [ProductController::class, 'updateProductById']);
Route::delete('product/{id}', [ProductController::class, 'deleteProductById']);

// Order API
Route::get('order', [OrderController::class, 'getAllOrders']);
Route::post('order', [OrderController::class, 'createOrder']);
Route::get('order/{id}', [OrderController::class, 'getOrderById']);
Route::put('order/{id}', [OrderController::class, 'updateOrderById']);
Route::delete('order/{id}', [OrderController::class, 'deleteOrderById']);

// Order_Details
Route::get('order-detail', [OrderDetailController::class, 'getAllOrderDetails']);
Route::post('order-detail', [OrderDetailController::class, 'createOrderDetail']);
Route::get('order-detail/{id}', [OrderDetailController::class, 'getOrderDetailById']);
Route::put('order-detail/{id}', [OrderDetailController::class, 'updateOrderDetailById']);
Route::delete('order-detail/{id}', [OrderDetailController::class, 'deleteOrderDetailById']);

// Payment API
Route::get('payment', [PaymentController::class, 'getAllPayments']);
Route::post('payment', [PaymentController::class, 'createPayment']);
Route::get('payment/{id}', [PaymentController::class, 'getPaymentById']);
Route::put('payment/{id}', [PaymentController::class, 'updatePaymentById']);
Route::delete('payment/{id}', [PaymentController::class, 'deletePaymentById']);

// Transaction API
Route::get('transaction', [TransactionController::class, 'getAllTransactions']);
Route::post('transaction', [TransactionController::class, 'createTransaction']);
Route::get('transaction/{id}', [TransactionController::class, 'getTransactionById']);
Route::put('transaction/{id}', [TransactionController::class, 'updateTransactionById']);
Route::delete('transaction/{id}', [TransactionController::class, 'deleteTransactionById']);
