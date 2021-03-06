<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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
//backend
//if has session redirect to dashboard
Route::group(['middleware' => 'checkSession'], function () {
    Route::get('/cms/dashboard', [DashboardController::class, 'index'])->name('login');
    Route::get('/cms/adddatabase', [DashboardController::class, 'addDatabase'])->name('addDb');
    Route::get('/cms/editdatabase/{id}', [DashboardController::class, 'editDatabase']);




});


//if there is no session , redirect to login page
Route::group(['middleware' => 'hasSession'], function () {
    Route::get('/', [LoginController::class, 'index'])->name('dashboard');
});


Route::get('/cms/page/logout', function () {
    session()->flush();
    return redirect('/');
});
