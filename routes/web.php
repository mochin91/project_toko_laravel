<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductUserController;
use App\Http\Controllers\DetailsOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

//product

Route::get('/', [HomeController::class,'index']);
Route::get('/Product/details/{slug}', [ProductController::class,'details']);
Route::get('/Product/index', [ProductController::class,'index']);
Route::get('/Product/create', [ProductController::class, 'create'])->middleware(['auth','is_admin']);
Route::post('/Product', [ProductController::class,'store']);

//user
Route::get('User/index', [UserController::class, 'index'])->middleware(['auth','is_admin']);

//Order
Route::get('Order/{email}',[OrderController::class,'index']);
Route::get('All/Order',[OrderController::class,'all']);
Route::get('Detail/Order/{id}',[OrderController::class,'showDetails']);
Route::post('Order', [OrderController::class,'store']);

//chart
Route::get('Chart/{email}',[ProductUserController::class,'index'])->middleware(['auth']);
Route::post('Chart',[ProductUserController::class,'store']);
Route::patch('Chart/{product_id}/{user_id}/{email}',[ProductUserController::class,'updateStat']);



