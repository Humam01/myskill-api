<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

use App\Http\Controllers\ProductController;




// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/save', [ProductController::class, 'save'])->name('product.save');
Route::post('/login',[AuthController::class,'login'])->name('product.logn');

Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::delete('/{id}/delete', [ProductController::class, 'delete'])->name('product.delete');
