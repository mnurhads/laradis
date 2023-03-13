<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DepositController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;
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
    return view('welcome');
});

Route::get('/tes', function () {
    $p = Redis::incr('p');
    return $p;
});

Route::get('/anggota', [App\Http\Controllers\AnggotaController::class, 'getAnggota'])->name('member');
// deposite
Route::get('/deposit', [App\Http\Controllers\DepositController::class, 'index'])->name('deposit');
Route::post('/deposit/create', [App\Http\Controllers\DepositController::class, 'deposit'])->name('depocreate');
Route::get('/mark-as-read', [App\Http\Controllers\DepositController::class,'markAsRead'])->name('mark-as-read');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
