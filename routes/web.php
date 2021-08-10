<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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
Route::get('/', [HomeController::class,'index']);
Route::get('/Product/details/{slug}', [ProductController::class,'details']);
Route::get('/Product/index', [ProductController::class,'index']);
Route::get('/Product/create', [ProductController::class, 'create']);
Route::post('/Product', [ProductController::class,'store']);

