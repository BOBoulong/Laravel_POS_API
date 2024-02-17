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

// Order API
Route::get('getAllOrders', [OrderController::class, 'getAllOrders']);
Route::post('createOrder', [OrderController::class, 'createOrder']);
Route::get('getOrderById/{id}', [OrderController::class, 'getOrderById']);
Route::put('updateOrderById/{id}', [OrderController::class, 'updateOrderById']);
Route::delete('deleteOrderById/{id}', [OrderController::class, 'deleteOrderById']);

// Order_Details
Route::get('getAllOrderDetails', [OrderDetailController::class, 'getAllOrderDetails']);
Route::post('createOrderDetail', [OrderDetailController::class, 'createOrderDetail']);
Route::get('getOrderDetailById/{id}', [OrderDetailController::class, 'getOrderDetailById']);
Route::put('updateOrderDetailById/{id}', [OrderDetailController::class, 'updateOrderDetailById']);
Route::delete('deleteOrderDetailById/{id}', [OrderDetailController::class, 'deleteOrderDetailById']);

// Payment API
Route::get('getAllPayments', [PaymentController::class, 'getAllPayments']);
Route::post('createPayment', [PaymentController::class, 'createPayment']);
Route::get('getPaymentById/{id}', [PaymentController::class, 'getPaymentById']);
Route::put('updatePaymentById/{id}', [PaymentController::class, 'updatePaymentById']);
Route::delete('deletePaymentById/{id}', [PaymentController::class, 'deletePaymentById']);

// Transaction API
Route::get('getAllTransactions', [TransactionController::class, 'getAllTransactions']);
Route::post('createTransaction', [TransactionController::class, 'createTransaction']);
Route::get('getTransactionById/{id}', [TransactionController::class, 'getTransactionById']);
Route::put('updateTransactionById/{id}', [TransactionController::class, 'updateTransactionById']);
Route::delete('deleteTransactionById/{id}', [TransactionController::class, 'deleteTransactionById']);
