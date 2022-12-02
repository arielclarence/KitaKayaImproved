<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\CsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
// jangan lupa import sayang
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserBiasaController;
use App\Http\Controllers\UserVIPController;
use App\Http\Controllers\VideoController;
use Illuminate\Http\Request;

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

Route::get('/kembali', [LoginController::class, "goback"]);

Route::prefix("/email")->group(function() {
    Route::view("/verify","Email.verify")->name("verification.notice");
    Route::get("/verify/{id}/{hash}", [LoginController::class, "verifyemail"])->name('verification.verify');
});



Route::prefix('/admin')->group(function() {
    Route::get('/home', [AdminController::class, "view"]);
    Route::get('/listvideo', [AdminController::class, "listvideo"]);
    Route::get('/chart', [AdminController::class, "chart"])->name('homeadd');
    Route::post('/chart', [AdminController::class, "addChart"]);
    Route::post('/chartt', [AdminController::class, "filter"]);
    Route::get('/chart/{id}', [AdminController::class, "delete"]);
    Route::get('/chart/{id}/edit', [AdminController::class, "update"]);
    Route::post('/chart/{id}/edit', [AdminController::class, "update"]);
    Route::get('/validasi', [AdminController::class, "validasi"]);
    Route::get('/chartperkembangan', [AdminController::class, "chartperkembangan"]);
    Route::get('/chartumur', [AdminController::class, "chartumur"])->name('homeumur');
    Route::post('/addVideo', [VideoController::class, 'add']);
    Route::get('/logout', [AdminController::class, "logout"]);
});

Route::prefix('/cs')->group(function() {
    Route::get('/listcs', [CsController::class, "listcs"]);
    Route::get('/historycs', [CsController::class, "historycs"]);
    Route::get('/forum', [CsController::class, "forum"]);
});

Route::prefix('/userBiasa')->group(function() {
    Route::get('/video', [UserBiasaController::class, "view"]);
    Route::get('/forum', [UserBiasaController::class, "forum"]);
    Route::get('/forum/{id}', [UserBiasaController::class, "todetailforumbiasa"])->name('detailforumbiasa');
    Route::get('/editpost/{id}', [UserBiasaController::class, "toeditpostforumbiasa"])->name('toeditpostforumbiasa');
    Route::post('/editpost/{id}', [UserBiasaController::class, "editpostforumbiasa"])->name('editpostforumbiasa');
    Route::get('/editreply/{id}', [UserBiasaController::class, "toeditreplyforumbiasa"])->name('toeditreplyforumbiasa');
    Route::post('/editreply/{id}', [UserBiasaController::class, "editreplyforumbiasa"])->name('editreplyforumbiasa');

    Route::post('/forum/{id}', [UserBiasaController::class, "addpostforumbiasa"])->name('addpostforumbiasa');
    Route::post('/addreply/{id}', [UserBiasaController::class, "addreplyforumbiasa"])->name('addreplyforumbiasa');
    Route::post('/addreplycomment/{id}', [UserBiasaController::class, "addreplycommentforumbiasa"])->name('addreplycommentforumbiasa');

    Route::get('/upgrade', [UserBiasaController::class, "upgrade"]);
    Route::get('/history', [UserBiasaController::class, "history"]);
    Route::get('/cs', [UserBiasaController::class, "cs"]);
    Route::post('/pertanyaan', [UserBiasaController::class, "addpertanyaan"])->name('addpertanyaan');

    Route::get('/cs/{id}', [UserBiasaController::class, "todetailcs"])->name('detailcs');
    Route::post('/chat/{id}', [UserBiasaController::class, "addchat"])->name('addchat');

});

Route::prefix('/userVip')->group(function() {
    Route::get('/video', [UserVIPController::class, "view"]);
    Route::get('/forum', [UserVIPController::class, "forum"]);
    Route::get('/forum/{id}', [UserVIPController::class, "todetailforumvip"])->name('detailforumvip');
    Route::get('/editpost/{id}', [UserVIPController::class, "toeditpostforumvip"])->name('toeditpostforumvip');
    Route::post('/editpost/{id}', [UserVIPController::class, "editpostforumvip"])->name('editpostforumvip');
    Route::get('/editreply/{id}', [UserVIPController::class, "toeditreplyforumvip"])->name('toeditreplyforumvip');
    Route::post('/editreply/{id}', [UserVIPController::class, "editreplyforumvip"])->name('editreplyforumvip');

    Route::post('/forum/{id}', [UserVIPController::class, "addpostforumvip"])->name('addpostforumvip');
    Route::post('/addreply/{id}', [UserVIPController::class, "addreplyforumvip"])->name('addreplyforumvip');
    Route::post('/addreplycomment/{id}', [UserVIPController::class, "addreplycommentforumvip"])->name('addreplycommentforumvip');

    Route::get('/rekomendasi', [UserVIPController::class, "rekomendasi"]);
    Route::get('/history', [UserVIPController::class, "history"]);
    Route::get('/cs', [UserVIPController::class, "cs"]);
    Route::post('/pertanyaan', [UserVIPController::class, "addpertanyaanvip"])->name('addpertanyaanvip');

    Route::get('/cs/{id}', [UserVIPController::class, "todetailcsvip"])->name('detailcsvip');
    Route::post('/chat/{id}', [UserVIPController::class, "addchatvip"])->name('addchatvip');
    Route::post('/finishchat/{id}', [UserVIPController::class, "finishservicevip"])->name('finishservicevip');
    Route::post('/rate/{id}', [UserVIPController::class, "rateservicevip"])->name('rateservicevip');


});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/get/video', [VideoController::class, 'getByKategori']);
Route::get('/get/chart/perkembangan', [AdminController::class, 'getMemberByYear']);
