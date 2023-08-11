<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Inertia\Inertia;
use App\Http\Controllers\HolderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StandarController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OPController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\ToolProcessController;
use Illuminate\Support\Facades\Route;

//Route::inertia('/', 'login');
Route::get('/', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create']);


Route::middleware('auth', 'admin')->group(function () {


    Route::resource('register-item', ItemController::class);
    Route::get('register-item.search', [ItemController::class, 'search'])->name('register-item.search');
    Route::resource('register-item', ItemController::class);

    Route::resource('register-line', \App\Http\Controllers\LineController::class);
    // Route::get('register-op/{line}', '\App\Http\Controllers\LineController@showOpData')->name('register-op.line');
    Route::get('register-op/{line}', 'OPController@index')->name('register-op.index');

    Route::resource('register-standar', StandarController::class);
    Route::get('register-standar.search', [StandarController::class, 'search'])->name('register-standar.search');
    Route::resource('register-standar', StandarController::class);
    //Route::resource('register-standar', StandarController::class);

    Route::resource('user-account', UserController::class);
    Route::get('user-account.search', [UserController::class, 'search'])->name('user-account.search');
    Route::resource('user-account', UserController::class);

    Route::resource('register-holder', HolderController::class);
    Route::get('register-holder.search', [HolderController::class, 'search'])->name('register-holder.search');
    Route::resource('register-holder', HolderController::class);


    Route::resource('register-op', OpController::class);
    Route::get('tool-process/{id}', '\App\Http\Controllers\OPController@showTPData')->name('tool-process.op');

    Route::resource('register-pos', \App\Http\Controllers\PosController::class);
    Route::get('register-pos.search', [PosController::class, 'search'])->name('register-pos.search');
    Route::resource('register-pos', \App\Http\Controllers\PosController::class);



    Route::resource('shift', ShiftController::class);
    Route::resource('shift', ShiftController::class);

    Route::resource('tool-process', ToolProcessController::class);
    //Route::get('tool-process.search', [ToolProcessController::class, 'search'])->name('tool-process.search');
    Route::resource('tool-process', ToolProcessController::class);

    Route::resource('register-tool', \App\Http\Controllers\ToolController::class);
    Route::get('register-tool.search', [ToolController::class, 'search'])->name('register-tool.search');
    Route::resource('register-tool', \App\Http\Controllers\ToolController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard.index');
    Route::get('resume-dashboard', function () {
        return view('resume-dashboard');
    })->name('resume-dashboard');

    // view ke resume tool
    Route::get('resume-tool', function () {
        return view('resume-tool');
    })->name('resume-tool');

    // view ke resume holder
    Route::get('resume-holder', function () {
        return view('resume-holder');
    })->name('resume-holder');


    // view ke historical data
    Route::get('historical-data', function () {
        return view('historical-data');
    })->name('historical-data');
});

require __DIR__ . '/auth.php';
