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


Route::get('/', function () {return view('index');} );
Route::post('/', [LoginController::class, "login"]);

Route::get('/register', [LoginController::class, "regis"]);
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
    Route::get('/chart', [AdminController::class, "chart"]);
    Route::post('/chart', [AdminController::class, "addChart"]);
    Route::post('/chartt', [AdminController::class, "filter"]);
    Route::get('/chart/{id}', [AdminController::class, "delete"]);
    Route::get('/chart/{id}/edit', [AdminController::class, "update"]);
    Route::post('/chart/{id}/edit', [AdminController::class, "update"]);
    Route::get('/validasi', [AdminController::class, "validasi"]);
    Route::get('/chartperkembangan', [AdminController::class, "chartperkembangan"]);
    Route::get('/chartumur', [AdminController::class, "chartumur"]);
    Route::post('/addVideo', [VideoController::class, 'add']);
    Route::get('/logout', [AdminController::class, "logout"]);
});

Route::prefix('/cs')->group(function() {
    Route::get('/listcs', [CsController::class, "listcs"]);
    Route::get('/cs/{id}', [CsController::class, "todetailcscs"]);
    Route::post('/chat/{id}', [CsController::class, "addchatcs"]);
    Route::post('/unsend/{id}', [CsController::class, "unsendchatcs"]);

    Route::get('/historycs', [CsController::class, "historycs"]);
    Route::get('/forum', [CsController::class, "forum"]);
    Route::get('/forum/{id}', [CsController::class, "todetailforumcs"])->name('detailforumcs');
    Route::get('/editpost/{id}', [CsController::class, "toeditpostforumcs"])->name('toeditpostforumcs');

    Route::post('/editpost/{id}', [CsController::class, "editpostforumcs"])->name('editpostforumcs');
    Route::get('/editreply/{id}', [CsController::class, "toeditreplyforumcs"])->name('toeditreplyforumcs');
    Route::post('/editreply/{id}', [CsController::class, "editreplyforumcs"])->name('editreplyforumcs');

    Route::post('/forum/{id}', [CsController::class, "addpostforumcs"])->name('addpostforumcs');
    Route::post('/addreply/{id}', [CsController::class, "addreplyforumcs"])->name('addreplyforumcs');
    Route::post('/addreplycomment/{id}', [CsController::class, "addreplycommentforumcs"])->name('addreplycommentforumcs');

    Route::get('/logout', [AdminController::class, "logout"]);
});

Route::prefix('/userBiasa')->group(function() {
    Route::get('/video', [UserBiasaController::class, "view"]);
    Route::get('/forum', [UserBiasaController::class, "forum"]);
    Route::get('/forum/{id}', [UserBiasaController::class, "todetailforumbiasa"]);
    Route::get('/editpost/{id}', [UserBiasaController::class, "toeditpostforumbiasa"]);
    Route::post('/editpost/{id}', [UserBiasaController::class, "editpostforumbiasa"]);
    Route::get('/editreply/{id}', [UserBiasaController::class, "toeditreplyforumbiasa"]);
    Route::post('/editreply/{id}', [UserBiasaController::class, "editreplyforumbiasa"]);

    Route::post('/forum/{id}', [UserBiasaController::class, "addpostforumbiasa"]);
    Route::post('/addreply/{id}', [UserBiasaController::class, "addreplyforumbiasa"]);
    Route::post('/addreplycomment/{id}', [UserBiasaController::class, "addreplycommentforumbiasa"]);

    Route::get('/upgrade', [UserBiasaController::class, "upgrade"]);
    Route::get('/history', [UserBiasaController::class, "history"]);
    Route::get('/cs', [UserBiasaController::class, "cs"]);
    Route::post('/pertanyaan', [UserBiasaController::class, "addpertanyaan"]);

    Route::post('/finishchat/{id}', [UserBiasaController::class, "finishservicebiasa"]);
    Route::post('/rate/{id}', [UserBiasaController::class, "rateservicebiasa"]);
    Route::post('/unsend/{id}', [UserBiasaController::class, "unsendchatbiasa"]);

    Route::get('/cs/{id}', [UserBiasaController::class, "todetailcs"]);
    Route::post('/chat/{id}', [UserBiasaController::class, "addchat"]);

    Route::post('/video', [UserBiasaController::class, "changepass"]);

});

Route::prefix('/userVip')->group(function() {
    Route::get('/video', [UserVIPController::class, "view"]);
    Route::get('/forum', [UserVIPController::class, "forum"]);
    Route::get('/forum/{id}', [UserVIPController::class, "todetailforumvip"]);
    Route::get('/editpost/{id}', [UserVIPController::class, "toeditpostforumvip"]);
    Route::post('/editpost/{id}', [UserVIPController::class, "editpostforumvip"]);
    Route::get('/editreply/{id}', [UserVIPController::class, "toeditreplyforumvip"]);
    Route::post('/editreply/{id}', [UserVIPController::class, "editreplyforumvip"]);

    Route::post('/forum/{id}', [UserVIPController::class, "addpostforumvip"]);
    Route::post('/addreply/{id}', [UserVIPController::class, "addreplyforumvip"]);
    Route::post('/addreplycomment/{id}', [UserVIPController::class, "addreplycommentforumvip"]);

    Route::get('/rekomendasi', [UserVIPController::class, "rekomendasi"]);
    Route::get('/history', [UserVIPController::class, "history"]);
    Route::get('/cs', [UserVIPController::class, "cs"]);
    Route::post('/pertanyaan', [UserVIPController::class, "addpertanyaanvip"]);

    Route::get('/cs/{id}', [UserVIPController::class, "todetailcsvip"]);
    Route::post('/chat/{id}', [UserVIPController::class, "addchatvip"]);
    Route::post('/unsend/{id}', [UserVIPController::class, "unsendchatvip"]);
    Route::post('/finishchat/{id}', [UserVIPController::class, "finishservicevip"]);
    Route::post('/rate/{id}', [UserVIPController::class, "rateservicevip"]);

    Route::post('/video', [UserVIPController::class, "changepass"]);

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/get/video', [VideoController::class, 'getByKategori']);
Route::get('/get/chart/perkembangan', [AdminController::class, 'getMemberByYear']);
