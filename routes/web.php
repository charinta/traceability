<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HistoricalDataController;
use App\Http\Controllers\ToolPositionController;
use App\Http\Controllers\HolderPositionController;
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
    Route::get('register-op/{line_id}', '\App\Http\Controllers\OPController@index')->name('register-op.line');

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


    Route::post('register-op/{line_id}', '\App\Http\Controllers\OPController@store')->name('register-op.store');
    Route::delete('register-op/{id}', '\App\Http\Controllers\OPController@destroy')->name('register-op.destroy');
    Route::get('register-op/{id}/edit', '\App\Http\Controllers\OPController@edit')->name('register-op.edit');
    Route::put('register-op/{id}/update', '\App\Http\Controllers\OPController@update')->name('register-op.update');

    Route::get('tool-process/{op_id}', '\App\Http\Controllers\ToolProcessController@index')->name('tool-process.op');
    Route::post('tool-process/{line_id}/{op_id}', '\App\Http\Controllers\ToolProcessController@store')->name('tool-process.store');
    Route::delete('tool-process/{id}', '\App\Http\Controllers\ToolProcessController@destroy')->name('tool-process.destroy');
    Route::get('tool-process/{id}/edit', '\App\Http\Controllers\ToolProcessController@edit')->name('tool-process.edit');
    Route::put('tool-process/{id}/update', '\App\Http\Controllers\ToolProcessController@update')->name('tool-process.update');

    Route::resource('register-pos', \App\Http\Controllers\PosController::class);
    Route::get('register-pos.search', [PosController::class, 'search'])->name('register-pos.search');
    Route::resource('register-pos', \App\Http\Controllers\PosController::class);



    Route::resource('shift', ShiftController::class);
    Route::resource('shift', ShiftController::class);


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
    Route::resource('resume-tool', \App\Http\Controllers\ToolPositionController::class);
    Route::get('resume-tool.search', [ToolPositionController::class, 'search'])->name('resume-tool.search');

    // view ke resume holder
    Route::resource('resume-holder', \App\Http\Controllers\HolderPositionController::class);
    Route::get('resume-holder.search', [HolderPositionController::class, 'search'])->name('resume-holder.search');

    // view ke historical data
    Route::resource('historical-data', \App\Http\Controllers\HistoricalDataController::class);
    Route::get('historical-data.search', [HistoricalDataController::class, 'search'])->name('historical-data.search');
});

require __DIR__ . '/auth.php';
