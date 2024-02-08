<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';

// Route::get('/category', [CategoryController::class, 'index']);
// Route::get('/category/create', [CategoryController::class, 'create']);
// Route::post('/category', [CategoryController::class, 'store']);
// Route::get("/category/{categoryId}/edit", [CategoryController::class, 'edit']);
// Route::put("/category/{categoryId}", [CategoryController::class, 'update']);
// Route::delete("/category/{categoryId}", [CategoryController::class, 'destroy']);
// Route::get('/category/{cateId}', [CategoryController::class, 'show']);
