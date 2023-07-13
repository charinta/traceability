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
    // view ke dashboard
    Route::get('/', [HomeController::class, 'home']);
        Route::get('dashboard', function () {
            return view('session/dashboard');
        })->name('dashboard');

        // view ke user account
        Route::get('user-account', function () {
            return view('session/user-account');
        })->name('user-account');

        // view ke register pos
        Route::get('register-pos', function () {
            return view('session/register-pos');
        })->name('register-pos');

        // view ke register line op
        Route::get('register-line-op', function () {
            return view('session/register-line-op');
        })->name('register-line-op');

         // view ke register op
         Route::get('register-op', function () {
            return view('session/register-op');
        })->name('register-op');

        // view ke register tool
        Route::get('register-tool', function () {
            return view('session/register-tool');
        })->name('register-tool');

        // view ke register holder
        Route::get('register-holder', function () {
            return view('session/register-holder');
        })->name('register-holder');

        // view ke register item
        Route::get('register-item', function () {
            return view('session/register-item');
        })->name('register-item');

        // view ke resume dashboard
        Route::get('resume-dashboard', function () {
            return view('session/resume-dashboard');
        })->name('resume-dashboard');

        // view ke resume tool
        Route::get('resume-tool', function () {
            return view('session/resume-tool');
        })->name('resume-tool');

        // view ke resume holder
        Route::get('resume-holder', function () {
            return view('session/resume-holder');
        })->name('resume-holder');
// });