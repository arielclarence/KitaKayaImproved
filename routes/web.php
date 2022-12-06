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
Route::post('/', [LoginController::class, "login"])->name('login');

Route::get('/register', [LoginController::class, "regis"]);
Route::post('/register', [LoginController::class, "Register"]);
Route::get('/logout', [LoginController::class, "logout"]);

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
    Route::get('/listmember', [AdminController::class, "listmember"])->middleware([AdminMiddleware::class]);
    Route::post('/listmember', [AdminController::class, "searchmember"])->middleware([AdminMiddleware::class]);
    Route::get('/chartperkembangan', [AdminController::class, "chartperkembangan"])->middleware([AdminMiddleware::class]);
    Route::get('/chartumur', [AdminController::class, "chartumur"])->name('homeumur')->middleware([AdminMiddleware::class]);
    Route::post('/addVideo', [VideoController::class, 'add'])->middleware([AdminMiddleware::class]);
    Route::get('/logout', [AdminController::class, "logout"]);
});

Route::prefix('/cs')->group(function() {
    Route::get('/listcs', [CsController::class, "listcs"])->name('CsHome')->middleware([CsMiddleware::class]);
    Route::get('/cs/{id}', [CsController::class, "todetailcscs"])->name('todetailcscs')->middleware([CsMiddleware::class]);
    Route::post('/chat/{id}', [CsController::class, "addchatcs"])->name('addchatcs')->middleware([CsMiddleware::class]);
    Route::post('/unsend/{id}', [CsController::class, "unsendchatcs"])->name('unsendchatcs')->middleware([CsMiddleware::class]);

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
    Route::get('/logout', [AdminController::class, "logout"]);
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

    Route::post('/finishchat/{id}', [UserBiasaController::class, "finishservicebiasa"])->name('finishservicebiasa');
    Route::post('/rate/{id}', [UserBiasaController::class, "rateservicebiasa"])->name('rateservicebiasa');
    Route::post('/unsend/{id}', [UserBiasaController::class, "unsendchatbiasa"])->name('unsendchatbiasa');

    Route::get('/cs/{id}', [UserBiasaController::class, "todetailcs"])->name('detailcs');
    Route::post('/chat/{id}', [UserBiasaController::class, "addchat"])->name('addchat');

    Route::get('/profile', [UserBiasaController::class, "todetailuser"]);

    Route::post('/video', [UserBiasaController::class, "changepass"]);

    Route::get('/halamanupgrade', [UserBiasaController::class, "viewHalamanUpgrade"]);
    Route::get('/halamanupgradee', [UserBiasaController::class, "viewHalamanUpgrade2"]);
    Route::get('/halamanupgradeee', [UserBiasaController::class, "viewHalamanUpgrade3"]);
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
    Route::post('/unsend/{id}', [UserVIPController::class, "unsendchatvip"])->name('unsendchatvip');
    Route::post('/finishchat/{id}', [UserVIPController::class, "finishservicevip"])->name('finishservicevip');
    Route::post('/rate/{id}', [UserVIPController::class, "rateservicevip"])->name('rateservicevip');

    Route::post('/video', [UserVIPController::class, "changepass"]);

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/get/video', [VideoController::class, 'getByKategori']);
Route::get('/get/chart/perkembangan', [AdminController::class, 'getMemberByYear']);
