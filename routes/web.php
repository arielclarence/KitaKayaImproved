<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuyerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
// jangan lupa import sayang
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserBiasaController;
use App\Http\Controllers\UserVIPController;

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

// Route::get('/', function () {
//     // return view('Halo Om');
//     return response('Hello World',404);
// });


Route::get('/', function () {return view('index');} )->name("login");
Route::post('/', [LoginController::class, "login"]);

Route::get('/register', [LoginController::class, "regis"] );
Route::post('/register', [LoginController::class, "Register"]);
Route::get('/logout', [LoginController::class, "logout"]);

Route::prefix('/admin')->group(function() {
    Route::get('/home', [AdminController::class, "view"]);
    Route::get('/listvideo', [AdminController::class, "listvideo"]);
    Route::get('/chart', [AdminController::class, "chart"]);
    Route::get('/validasi', [AdminController::class, "validasi"]);
    Route::get('/chartperkembangan', [AdminController::class, "chartperkembangan"]);
    Route::get('/chartumur', [AdminController::class, "chartumur"]);

});

Route::prefix('/userBiasa')->group(function() {
    Route::get('/video', [UserBiasaController::class, "view"]);
    Route::get('/forum', [UserBiasaController::class, "forum"]);
    Route::get('/upgrade', [UserBiasaController::class, "upgrade"]);
    Route::get('/history', [UserBiasaController::class, "history"]);
    Route::get('/cs', [UserBiasaController::class, "cs"]);
});

Route::prefix('/userVip')->group(function() {
    Route::get('/video', [UserVIPController::class, "view"]);
    Route::get('/forum', [UserVIPController::class, "forum"]);
    Route::get('/rekomendasi', [UserVIPController::class, "rekomendasi"]);
    Route::get('/history', [UserVIPController::class, "history"]);
    Route::get('/cs', [UserVIPController::class, "cs"]);
});

