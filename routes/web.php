<?php

use App\Http\Controllers\AhliController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmbedController;
use App\Http\Controllers\GugatanPerdataController;
use App\Http\Controllers\LocalServiceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PutusansatwaController;
use App\Http\Controllers\SDAController;
use App\Http\Livewire\GugatanPerdataComponent;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// service
Route::get('/rest/test', [LocalServiceController::class, 'index']);
Route::get('/rest/tahun', [LocalServiceController::class, 'getTahun']);
Route::get('/rest/jumlahkorban', [LocalServiceController::class, 'getJumlahKorban']);
Route::get('/rest/getbentuk', [LocalServiceController::class, 'getBentuk']);
Route::get('/rest/getkasus/', [LocalServiceController::class, 'getCountKasus']);
Route::get('/embed/map', [EmbedController::class, 'map']);
Route::get('/embed/jumlahkasus', [EmbedController::class, 'jumlahkasus']);
Route::get('/embed/gender', [EmbedController::class, 'gender']);
Route::get('/embed/jumlahkorban', [EmbedController::class, 'jumlahkorban']);
Route::get('/embed/bentukancaman', [EmbedController::class, 'bentukancaman']);
Route::get('/embed/sektor', [EmbedController::class, 'sektor']);

//backend
//if has session redirect to dashboard
Route::group(['middleware' => 'checkSession'], function () {
    Route::get('/cms/dashboard', [DashboardController::class, 'index'])->name('login');
    Route::get('/cms/dbahli', [AhliController::class, 'index'])->name('ahli');
    Route::get('/cms/dbsda', [SDAController::class, 'index'])->name('sda');
    Route::get('/cms/gugatanperdata', [GugatanPerdataController::class, 'index'])->name('gugatanperdata');
    Route::get('/cms/putusansatwa', [PutusansatwaController::class, 'index'])->name('putusansatwa');


    Route::group(['middleware' => 'cekUser'], function () {
        Route::get('/cms/adddatabase', [DashboardController::class, 'addDatabase'])->name('addDb');
        Route::get('/cms/addgugatanperdata', [GugatanPerdataController::class, 'addGugatanPerdata'])->name('addgugatanperdata');
        Route::get('/cms/editdatabase/{id}', [DashboardController::class, 'editDatabase']);
        Route::get('/cms/addahli', [AhliController::class, 'addahli'])->name('addahli');
        Route::get('/cms/editahli/{id}', [AhliController::class, 'editahli'])->name('editahli');
        Route::get('/cms/addsda', [SDAController::class, 'addSda'])->name('addSda');
        Route::get('/cms/editsda/{id}', [SDAController::class, 'editsda'])->name('editsda');
        Route::get('/cms/editperdata/{id}', [GugatanPerdataController::class, 'editperdata'])->name('editperdata');
        Route::get('/cms/addputusansatwa', [PutusansatwaController::class, 'addPutusansatwa'])->name('addputusansatwa');
        Route::get('/cms/editputusansatwa/{id}', [PutusansatwaController::class, 'editPutusanSatwa'])->name('editputusansatwa');


    });

});


//if there is no session , redirect to login page
Route::group(['middleware' => 'hasSession'], function () {
    Route::get('/', [LoginController::class, 'index'])->name('dashboard');
});


Route::get('/cms/page/logout', function () {
    session()->flush();
    return redirect('/');
});
