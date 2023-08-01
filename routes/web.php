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

Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard.index');

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
//Route::resource('register-standar', StandarController::class);

Route::resource('user-account', UserController::class);
Route::get('user-account.search', [UserController::class, 'search'])->name('user-account.search');
Route::resource('user-account', UserController::class);

Route::resource('register-holder', HolderController::class);
//Route::get('register-holder.search', [HolderController::class, 'search'])->name('register-holder.search');
Route::resource('register-holder', HolderController::class);


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

// route view user-account
// route view register-line-op
// Route::get('register-line-op', [LineController::class, 'getLine'])->name('register-line-op.getLine');
//Route::post('register-line-op', [LineController::class, 'storeLine'])->name('register-line-op.storeLine');
//Route::get('edit-register-line-op/{line}', [LineController::class, 'editLine'])->name('register-line-op.editLine');
//Route::put('register-line-op/{line}', [LineController::class, 'updateLine'])->name('register-line-op.updateLine');
//Route::delete('register-line-op/{line}', [LineController::class, 'destroy'])->name('register-line-op.destroy');

// route view register-tool
Route::get('register-tool', [ToolController::class, 'getTool'])->name('register-tool.getTool');
Route::post('register-tool', [ToolController::class, 'storeTool'])->name('register-tool.storeTool');
Route::get('edit-register-tool/{tool}', [ToolController::class, 'editTool'])->name('register-tool.editTool');
Route::put('register-tool/{tool}', [ToolController::class, 'updateTool'])->name('register-tool.updateTool');
Route::delete('register-tool/{tool}', [ToolController::class, 'destroy'])->name('register-tool.destroy');

// });

// route view register-line-op


// route view register-tool
Route::get('register-tool', [ToolController::class, 'getTool'])->name('register-tool.getTool');
Route::post('register-tool', [ToolController::class, 'storeTool'])->name('register-tool.storeTool');
Route::get('edit-register-tool/{tool}', [ToolController::class, 'editTool'])->name('register-tool.editTool');
Route::put('register-tool/{tool}', [ToolController::class, 'updateTool'])->name('register-tool.updateTool');
Route::delete('register-tool/{tool}', [ToolController::class, 'destroy'])->name('register-tool.destroy');
