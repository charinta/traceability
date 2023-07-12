<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'home']);
        Route::get('dashboard', function () {
            return view('session/dashboard');
        })->name('dashboard');

        Route::get('user-account', function () {
            return view('session/user-account');
        })->name('user-account');

        Route::get('register-pos', function () {
            return view('session/register-pos');
        })->name('register-pos');

        Route::get('register-line-op', function () {
            return view('session/register-line-op');
        })->name('register-line-op');
// });