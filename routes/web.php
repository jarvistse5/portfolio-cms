<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PortfolioController;
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

Route::get('/', function () {
    // return view('welcome');
    return "It is a demo website for Jarvis Tse";
});

Route::prefix('cms')->name('cms')->group(function () {
    Route::prefix('auth')->name('.auth')->group(function () {
        Route::get('login', [AuthController::class, 'loginIndex'])->name('.login.index');
        Route::post('login', [AuthController::class, 'login'])->name('.login.post');
        Route::get('signup', [AuthController::class, 'signupIndex'])->name('.signup.index');
        Route::post('signup', [AuthController::class, 'signup'])->name('.signup.post');
    });
});

Route::get('jarvistse', [PortfolioController::class, 'index'])->name('.jarvistse');
Route::get('wing', [PortfolioController::class, 'wing'])->name('.wing');