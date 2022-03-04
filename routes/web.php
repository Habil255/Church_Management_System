<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountantController;
use App\Http\Controllers\ParishController;
use App\Http\Controllers\AuthController;
use GuzzleHttp\Middleware;
use App\Http\Middleware\Authcheck;
use App\Http\Middleware\Admincheck;

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

Route::get('/data', [UserController::class, 'chartData']);

Route::get('/test', function () {
    
    return view('test');
});
//NORMAL USER CONTROL CODES
Route::prefix('user')->group(function () { 
    Route::get('/insert', [UserController::class, 'create']);

    });

//Roles CONTROL CODES
Route::get('/role/insert', [RoleController::class, 'create']);
Route::get('/gett/user', [RoleController::class, 'store']);



//PARISH WORKER CONTROL CODES
Route::prefix('parish')->group(function () { 
    Route::get('/home', [ParishController::class, 'index']);
});



//NORMAL Accountant CONTROL Codes
Route::prefix('accountant')->middleware([AuthCheck::class])->group(function () {
    
    Route::get('/home', [AccountantController::class, 'index']);
    // Route::get('/home', [AuthController::class, 'login']);
    
}); 


Route::prefix('admin')->group(function () {
    
    Route::get('/home', [AdminController::class, 'index']);
    Route::get('/create-roles', [AdminController::class, 'roles']);
    Route::post('/create-roles', [AdminController::class, 'createRoles'])->name('create.roles');
    // Route::get('/home', [AdminController::class, 'index']);
    // Route::get('/home', [AuthController::class, 'login']);
    
}); 


// Authentication control codes
Route::get('/login', [AuthController::class, 'login']);
Route::get('/Auth', [AuthController::class, 'index']);

Route::get('/user-logout', [AuthController::class,'logout'])->name('user-logout');

Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.custom');


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
