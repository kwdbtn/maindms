<?php

use App\Http\Controllers\MemoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\MemoController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\MemoController::class, 'index'])->name('home');
Route::get('memos/tray', [MemoController::class, 'tray'])->name('tray');

Route::resources([
    'memos' => MemoController::class,
    'users' => UserController::class,
]);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
