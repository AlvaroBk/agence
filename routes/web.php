<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\GraphController;

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

Route::get('/',[MainController::class,'index'])->name('home');
Route::get('/data{id}',[DataController::class,'getData'])->name('dataget');
Route::get('/report',[ReportController::class,'generateReport'])->name('get.report');
Route::get('/graph',[GraphController::class,'generateGraph'])->name('get.graph');
Route::get('/client',[ReportController::class,'generateReportCliente'])->name('get.client');
Route::get('/pie',[GraphController::class,'genartePieGraph'])->name('get.pie');
