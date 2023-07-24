<?php

use App\Http\Controllers\HolderController;
use App\Http\Controllers\HolderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StandarController;
use App\Http\Controllers\PosController;
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
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        // // view ke user account
        // Route::get('user-account', function () {
        //     return view('user-account');
        // })->name('user-account');

       
        Route::resource('register-pos',\App\Http\Controllers\PosController::class);
        Route::post('/update-status/{id}', [PosController::class, 'updateStatus'])->name('pos.updateStatus');
       
        Route::resource('register-standar',\App\Http\Controllers\StandarController::class);
       // Route::get('register-standar', [StandarController::class, 'index'])->name('register-standar.index');
        // Route::post('register-standar', [StandarController::class, 'store'])->name('register-standar.store');
        
        
        // view ke register line op
        Route::get('register-line-op', function () {
            return view('register-line-op');
        })->name('register-line-op');

         // view ke register op
         Route::get('register-op', function () {
            return view('register-op');
        })->name('register-op');

        // // view ke register tool
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

        // view ke register item
        Route::get('register-item', function () {
            return view('register-item');
        })->name('register-item');

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

        // });

        // route view user-account
        Route::get('user-account', [UserController::class, 'getUser'])->name('user-account.getUser');
        Route::post('user-account', [UserController::class, 'storeUser'])->name('user-account.storeUser');
        Route::get('edit-user-account/{user}', [UserController::class, 'editUser'])->name('user-account.editUser');
        Route::put('user-account/{user}', [UserController::class, 'updateUser'])->name('user-account.updateUser');
        Route::delete('user-account/{user}', [UserController::class, 'destroy'])->name('user-account.destroy');
        
        // route view register-holder
        Route::get('register-holder', [HolderController::class, 'getHolder'])->name('register-holder.getHolder');
        Route::post('register-holder', [HolderController::class, 'storeHolder'])->name('register-holder.storeHolder');
        Route::get('edit-register-holder/{holder}', [HolderController::class, 'editHolder'])->name('register-holder.editHolder');
        Route::put('register-holder/{holder}', [HolderController::class, 'updateHolder'])->name('register-holder.updateHolder');
        Route::delete('register-holder/{holder}', [HolderController::class, 'destroy'])->name('register-holder.destroy');

        // route view register-line-op
        Route::get('register-line-op', [LineController::class, 'getLine'])->name('register-line-op.getLine');
        Route::post('register-line-op', [LineController::class, 'storeLine'])->name('register-line-op.storeLine');
        Route::get('edit-register-line-op/{line}', [LineController::class, 'editLine'])->name('register-line-op.editLine');
        Route::put('register-line-op/{line}', [LineController::class, 'updateLine'])->name('register-line-op.updateLine');
        Route::delete('register-line-op/{line}', [LineController::class, 'destroy'])->name('register-line-op.destroy');
            
        // route view register-tool
        Route::get('register-tool', [ToolController::class, 'getTool'])->name('register-tool.getTool');
        Route::post('register-tool', [ToolController::class, 'storeTool'])->name('register-tool.storeTool');
        Route::get('edit-register-tool/{tool}', [ToolController::class, 'editTool'])->name('register-tool.editTool');
        Route::put('register-tool/{tool}', [ToolController::class, 'updateTool'])->name('register-tool.updateTool');
        Route::delete('register-tool/{tool}', [ToolController::class, 'destroy'])->name('register-tool.destroy');

        // });

        // route view user-account
        Route::get('user-account', [UserController::class, 'getUser'])->name('user-account.getUser');
        Route::post('user-account', [UserController::class, 'storeUser'])->name('user-account.storeUser');
        Route::get('edit-user-account/{user}', [UserController::class, 'editUser'])->name('user-account.editUser');
        Route::put('user-account/{user}', [UserController::class, 'updateUser'])->name('user-account.updateUser');
        Route::delete('user-account/{user}', [UserController::class, 'destroy'])->name('user-account.destroy');
        
        // route view register-holder
        Route::get('register-holder', [HolderController::class, 'getHolder'])->name('register-holder.getHolder');
        Route::post('register-holder', [HolderController::class, 'storeHolder'])->name('register-holder.storeHolder');
        Route::get('edit-register-holder/{holder}', [HolderController::class, 'editHolder'])->name('register-holder.editHolder');
        Route::put('register-holder/{holder}', [HolderController::class, 'updateHolder'])->name('register-holder.updateHolder');
        Route::delete('register-holder/{holder}', [HolderController::class, 'destroy'])->name('register-holder.destroy');

        // route view register-line-op
        Route::get('register-line-op', [LineController::class, 'getLine'])->name('register-line-op.getLine');
        Route::post('register-line-op', [LineController::class, 'storeLine'])->name('register-line-op.storeLine');
        Route::get('edit-register-line-op/{line}', [LineController::class, 'editLine'])->name('register-line-op.editLine');
        Route::put('register-line-op/{line}', [LineController::class, 'updateLine'])->name('register-line-op.updateLine');
        Route::delete('register-line-op/{line}', [LineController::class, 'destroy'])->name('register-line-op.destroy');
            
        // route view register-tool
        Route::get('register-tool', [ToolController::class, 'getTool'])->name('register-tool.getTool');
        Route::post('register-tool', [ToolController::class, 'storeTool'])->name('register-tool.storeTool');
        Route::get('edit-register-tool/{tool}', [ToolController::class, 'editTool'])->name('register-tool.editTool');
        Route::put('register-tool/{tool}', [ToolController::class, 'updateTool'])->name('register-tool.updateTool');
        Route::delete('register-tool/{tool}', [ToolController::class, 'destroy'])->name('register-tool.destroy');