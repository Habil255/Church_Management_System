<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserLoginController;

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

Route::get('/test', function () {
    
    return view('test');
});
//NORMAL USER CONTROL CODES
Route::prefix('user')->group(function () { 
    Route::get('/insert', [UserController::class, 'create']);

    });

//NORMAL USER CONTROL CODES
Route::get('/role/insert', [RoleController::class, 'create']);
Route::get('/gett/user', [RoleController::class, 'store']);


//NORMAL ADMIN CONTROL Codes
Route::prefix('admin')->group(function () {
    
    Route::get('/home', [AdminController::class, 'index'])->name('admin-home');
}); 


// Authentication control codes
Route::get('/login', [UserLoginController::class, 'index']);

Route::post('/login', [UserLoginController::class, 'loginProcess'])->name('login.custom');


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
