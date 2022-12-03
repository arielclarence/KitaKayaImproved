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
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Auth;
use App\Http\Middleware\BiasaMiddleware;
use App\Http\Middleware\CsMiddleware;
use App\Http\Middleware\VipMiddleware;
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


Route::get('/', function () {return view('index');} )->name("login")->middleware([Auth::class]);
Route::post('/', [LoginController::class, "login"]);

Route::get('/register', [LoginController::class, "regis"])->middleware([Auth::class]);
Route::post('/register', [LoginController::class, "Register"])->middleware([Auth::class]);
Route::get('/logoutBiasa', [LoginController::class, "logoutBiasa"]);
Route::get('/logoutVip', [LoginController::class, "logoutVip"]);
Route::get('/logoutAdmin', [LoginController::class, "logoutAdmin"]);
Route::get('/logoutCs', [LoginController::class, "logoutCs"]);

Route::get('/kembali', [LoginController::class, "goback"]);

Route::prefix("/email")->group(function() {
    Route::view("/verify","Email.verify")->name("verification.notice");
    Route::get("/verify/{id}/{hash}", [LoginController::class, "verifyemail"])->name('verification.verify');
});



Route::prefix('/admin')->group(function() {
    Route::get('/home', [AdminController::class, "view"])->name('AdminHome')->middleware([AdminMiddleware::class]);
    Route::get('/listvideo', [AdminController::class, "listvideo"])->middleware([AdminMiddleware::class]);
    Route::get('/chart', [AdminController::class, "chart"])->name('homeadd')->middleware([AdminMiddleware::class]);
    Route::post('/chart', [AdminController::class, "addChart"])->middleware([AdminMiddleware::class]);
    Route::post('/chartt', [AdminController::class, "filter"])->middleware([AdminMiddleware::class]);
    Route::get('/chart/{id}', [AdminController::class, "delete"])->middleware([AdminMiddleware::class]);
    Route::get('/chart/{id}/edit', [AdminController::class, "update"])->middleware([AdminMiddleware::class]);
    Route::post('/chart/{id}/edit', [AdminController::class, "update"])->middleware([AdminMiddleware::class]);
    Route::get('/validasi', [AdminController::class, "validasi"])->middleware([AdminMiddleware::class]);
    Route::get('/chartperkembangan', [AdminController::class, "chartperkembangan"])->middleware([AdminMiddleware::class]);
    Route::get('/chartumur', [AdminController::class, "chartumur"])->name('homeumur')->middleware([AdminMiddleware::class]);
    Route::post('/addVideo', [VideoController::class, 'add'])->middleware([AdminMiddleware::class]);
    Route::get('/logout', [AdminController::class, "logout"]);
});

Route::prefix('/cs')->group(function() {
    Route::get('/listcs', [CsController::class, "listcs"])->name('CsHome')->middleware([CsMiddleware::class]);
    Route::get('/cs/{id}', [CsController::class, "todetailcscs"])->name('detailcscs')->middleware([CsMiddleware::class]);
    Route::post('/chat/{id}', [CsController::class, "addchatcs"])->name('addchatcs')->middleware([CsMiddleware::class]);

    Route::get('/historycs', [CsController::class, "historycs"])->middleware([CsMiddleware::class]);
    Route::get('/forum', [CsController::class, "forum"])->middleware([CsMiddleware::class]);
    Route::get('/forum/{id}', [CsController::class, "todetailforumcs"])->name('detailforumcs')->middleware([CsMiddleware::class]);
    Route::get('/editpost/{id}', [CsController::class, "toeditpostforumcs"])->name('toeditpostforumcs')->middleware([CsMiddleware::class]);

    Route::post('/editpost/{id}', [CsController::class, "editpostforumcs"])->name('editpostforumcs')->middleware([CsMiddleware::class]);
    Route::get('/editreply/{id}', [CsController::class, "toeditreplyforumcs"])->name('toeditreplyforumcs')->middleware([CsMiddleware::class]);
    Route::post('/editreply/{id}', [CsController::class, "editreplyforumcs"])->name('editreplyforumcs')->middleware([CsMiddleware::class]);

    Route::post('/forum/{id}', [CsController::class, "addpostforumcs"])->name('addpostforumcs')->middleware([CsMiddleware::class]);
    Route::post('/addreply/{id}', [CsController::class, "addreplyforumcs"])->name('addreplyforumcs')->middleware([CsMiddleware::class]);
    Route::post('/addreplycomment/{id}', [CsController::class, "addreplycommentforumcs"])->name('addreplycommentforumcs')->middleware([CsMiddleware::class]);
});

Route::prefix('/userBiasa')->group(function() {
    Route::get('/video', [UserBiasaController::class, "view"])->name('userBiasaHome')->middleware([BiasaMiddleware::class]);
    Route::get('/forum', [UserBiasaController::class, "forum"])->middleware([BiasaMiddleware::class]);
    Route::get('/forum/{id}', [UserBiasaController::class, "todetailforumbiasa"])->name('detailforumbiasa')->middleware([BiasaMiddleware::class]);
    Route::get('/editpost/{id}', [UserBiasaController::class, "toeditpostforumbiasa"])->name('toeditpostforumbiasa')->middleware([BiasaMiddleware::class]);
    Route::post('/editpost/{id}', [UserBiasaController::class, "editpostforumbiasa"])->name('editpostforumbiasa')->middleware([BiasaMiddleware::class]);
    Route::get('/editreply/{id}', [UserBiasaController::class, "toeditreplyforumbiasa"])->name('toeditreplyforumbiasa')->middleware([BiasaMiddleware::class]);
    Route::post('/editreply/{id}', [UserBiasaController::class, "editreplyforumbiasa"])->name('editreplyforumbiasa')->middleware([BiasaMiddleware::class]);

    Route::post('/forum/{id}', [UserBiasaController::class, "addpostforumbiasa"])->name('addpostforumbiasa')->middleware([BiasaMiddleware::class]);
    Route::post('/addreply/{id}', [UserBiasaController::class, "addreplyforumbiasa"])->name('addreplyforumbiasa')->middleware([BiasaMiddleware::class]);
    Route::post('/addreplycomment/{id}', [UserBiasaController::class, "addreplycommentforumbiasa"])->name('addreplycommentforumbiasa')->middleware([BiasaMiddleware::class]);

    Route::get('/upgrade', [UserBiasaController::class, "upgrade"])->middleware([BiasaMiddleware::class]);
    Route::get('/history', [UserBiasaController::class, "history"])->middleware([BiasaMiddleware::class]);
    Route::get('/cs', [UserBiasaController::class, "cs"])->middleware([BiasaMiddleware::class]);
    Route::post('/pertanyaan', [UserBiasaController::class, "addpertanyaan"])->name('addpertanyaan')->middleware([BiasaMiddleware::class]);

    Route::post('/finishchat/{id}', [UserBiasaController::class, "finishservicebiasa"])->name('finishservicebiasa')->middleware([BiasaMiddleware::class]);
    Route::post('/rate/{id}', [UserBiasaController::class, "rateservicebiasa"])->name('rateservicebiasa')->middleware([BiasaMiddleware::class]);
    Route::post('/unsend/{id}', [UserBiasaController::class, "unsendchatbiasa"])->name('unsendchatbiasa')->middleware([BiasaMiddleware::class]);

    Route::get('/cs/{id}', [UserBiasaController::class, "todetailcs"])->name('detailcs')->middleware([BiasaMiddleware::class]);
    Route::post('/chat/{id}', [UserBiasaController::class, "addchat"])->name('addchat')->middleware([BiasaMiddleware::class]);

    Route::post('/video', [UserBiasaController::class, "changepass"]);

});

Route::prefix('/userVip')->group(function() {
    Route::get('/video', [UserVIPController::class, "view"])->name('userVipHome')->middleware([VipMiddleware::class]);
    Route::get('/forum', [UserVIPController::class, "forum"])->middleware([VipMiddleware::class]);
    Route::get('/forum/{id}', [UserVIPController::class, "todetailforumvip"])->name('detailforumvip')->middleware([VipMiddleware::class]);
    Route::get('/editpost/{id}', [UserVIPController::class, "toeditpostforumvip"])->name('toeditpostforumvip')->middleware([VipMiddleware::class]);
    Route::post('/editpost/{id}', [UserVIPController::class, "editpostforumvip"])->name('editpostforumvip')->middleware([VipMiddleware::class]);
    Route::get('/editreply/{id}', [UserVIPController::class, "toeditreplyforumvip"])->name('toeditreplyforumvip')->middleware([VipMiddleware::class]);
    Route::post('/editreply/{id}', [UserVIPController::class, "editreplyforumvip"])->name('editreplyforumvip')->middleware([VipMiddleware::class]);

    Route::post('/forum/{id}', [UserVIPController::class, "addpostforumvip"])->name('addpostforumvip')->middleware([VipMiddleware::class]);
    Route::post('/addreply/{id}', [UserVIPController::class, "addreplyforumvip"])->name('addreplyforumvip')->middleware([VipMiddleware::class]);
    Route::post('/addreplycomment/{id}', [UserVIPController::class, "addreplycommentforumvip"])->name('addreplycommentforumvip')->middleware([VipMiddleware::class]);

    Route::get('/rekomendasi', [UserVIPController::class, "rekomendasi"])->middleware([VipMiddleware::class]);
    Route::get('/history', [UserVIPController::class, "history"])->middleware([VipMiddleware::class]);
    Route::get('/cs', [UserVIPController::class, "cs"])->middleware([VipMiddleware::class]);
    Route::post('/pertanyaan', [UserVIPController::class, "addpertanyaanvip"])->name('addpertanyaanvip')->middleware([VipMiddleware::class]);

    Route::get('/cs/{id}', [UserVIPController::class, "todetailcsvip"])->name('detailcsvip')->middleware([VipMiddleware::class]);
    Route::post('/chat/{id}', [UserVIPController::class, "addchatvip"])->name('addchatvip')->middleware([VipMiddleware::class]);
    Route::post('/unsend/{id}', [UserVIPController::class, "unsendchatvip"])->name('unsendchatvip')->middleware([VipMiddleware::class]);
    Route::post('/finishchat/{id}', [UserVIPController::class, "finishservicevip"])->name('finishservicevip')->middleware([VipMiddleware::class]);
    Route::post('/rate/{id}', [UserVIPController::class, "rateservicevip"])->name('rateservicevip')->middleware([VipMiddleware::class]);

    Route::post('/video', [UserVIPController::class, "changepass"]);

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/get/video', [VideoController::class, 'getByKategori']);
Route::get('/get/chart/perkembangan', [AdminController::class, 'getMemberByYear']);
