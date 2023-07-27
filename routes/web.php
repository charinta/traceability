<?php

use App\Http\Controllers\HolderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StandarController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OPController;
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
// view ke login
Route::get('/', [HomeController::class, 'home']);
Route::get('login', function () {
    return view('login');
})->name('login');

        // view ke dashboard
        // Route::get('dashboard', function () {
        //     return view('dashboard');
        // })->name('dashboard');

// // view ke user account
// Route::get('user-account', function () {
//     return view('user-account');
// })->name('user-account');


Route::post('/update-status/{id}', [PosController::class, 'updateStatus'])->name('pos.updateStatus');

Route::resource('register-item', ItemController::class);
Route::get('register-item.search', [ItemController::class, 'search'])->name('register-item.search');
Route::resource('register-item', ItemController::class);

Route::resource('register-line', \App\Http\Controllers\LineController::class);

Route::get('register-op/{id}', '\App\Http\Controllers\LineController@showOpData')->name('register-op.line');

Route::resource('register-standar', StandarController::class);
Route::get('register-standar.search', [StandarController::class, 'search'])->name('register-standar.search');
Route::resource('register-standar', StandarController::class);


Route::get('register-op', [OpController::class, 'index'])->name('register-op.index');
Route::post('register-op', [OpController::class, 'store'])->name('register-op.store');
Route::delete('register-op/{item}', [OpController::class, 'destroy'])->name('register-op.destroy');

Route::resource('register-pos', \App\Http\Controllers\PosController::class);
Route::get('register-pos.search', [PosController::class, 'search'])->name('register-pos.search');
Route::resource('register-pos', \App\Http\Controllers\PosController::class);

//Route::get('register-item', [ItemController::class, 'index'])->name('register-item.index');
//Route::post('register-item', [ItemController::class, 'store'])->name('register-item.store');
//Route::get('edit-register-item/{item}', [ItemController::class, 'edit'])->name('register-item.edit');
//Route::put('register-item/{item}', [ItemController::class, 'update'])->name('register-item.update');
//Route::delete('register-item/{item}', [ItemController::class, 'destroy'])->name('register-item.destroy');

// // view ke register item
// Route::get('register-tool', function () {
//     return view('register-tool');
// })->name('register-tool');
// // view ke register tool
// Route::get('register-tool', function () {
//     return view('register-tool');
// })->name('register-tool');

// // view ke register holder
// Route::get('register-holder', function () {
//     return view('register-holder');
// })->name('register-holder');
// // view ke register holder
// Route::get('register-holder', function () {
//     return view('register-holder');
// })->name('register-holder');

// view ke resume dashboard
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


// view ke login
Route::get('login', function () {
    return view('login');
})->name('login');

        // view ke login
        Route::get('sign-up', function () {
            return view('sign-up');
        })->name('sign-up');

        // view ke historical data
        Route::get('historical-data', function () {
            return view('historical-data');
        })->name('historical-data');

// });

        
        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard.index');

        // route view user-account
        Route::get('user-account', [UserController::class, 'getUser'])->name('user-account.getUser');
        Route::post('user-account', [UserController::class, 'storeUser'])->name('user-account.storeUser');
        Route::get('edit-user-account/{id}', [UserController::class, 'editUser'])->name('user-account.editUser');
        Route::put('user-account/{id}', [UserController::class, 'updateUser'])->name('user-account.updateUser');
        Route::delete('user-account/{id}', [UserController::class, 'destroy'])->name('user-account.destroy');
        
        // route view register-holder
        Route::get('register-holder', [HolderController::class, 'getHolder'])->name('register-holder.getHolder');
        Route::post('register-holder', [HolderController::class, 'storeHolder'])->name('register-holder.storeHolder');
        Route::get('edit-register-holder/{holder_id}', [HolderController::class, 'editHolder'])->name('register-holder.editHolder');
        Route::put('register-holder/{holder_id}', [HolderController::class, 'updateHolder'])->name('register-holder.updateHolder');
        Route::delete('register-holder/{holder_id}', [HolderController::class, 'destroy'])->name('register-holder.destroy');

// route view register-line-op


// route view register-tool
Route::get('register-tool', [ToolController::class, 'getTool'])->name('register-tool.getTool');
Route::post('register-tool', [ToolController::class, 'storeTool'])->name('register-tool.storeTool');
Route::get('edit-register-tool/{tool}', [ToolController::class, 'editTool'])->name('register-tool.editTool');
Route::put('register-tool/{tool}', [ToolController::class, 'updateTool'])->name('register-tool.updateTool');
Route::delete('register-tool/{tool}', [ToolController::class, 'destroy'])->name('register-tool.destroy');