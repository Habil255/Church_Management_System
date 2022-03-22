<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PastorController;
use App\Http\Controllers\SecretaryController;
use App\Http\Controllers\AccountantController;
use App\Http\Controllers\ParishController;
use App\Http\Controllers\EvangelistController;
use App\Http\Controllers\AuthController;
use GuzzleHttp\Middleware;
use App\Http\Middleware\Authcheck;
use App\Http\Middleware\Pastorcheck;
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


//EVANGELIST CONTROL CODES
Route::prefix('evangelist')->middleware([AuthCheck::class])->group(function () { 
    Route::get('/home', [EvangelistController::class, 'index']);
});

//PARISH WORKER CONTROL CODES
Route::prefix('parish')->middleware([AuthCheck::class])->group(function () { 
    Route::get('/home', [ParishController::class, 'index']);
});

//PASTOR CONTROL CODES
Route::prefix('pastor')->middleware([PastorCheck::class])->group(function () { 
    Route::get('/home', [PastorController::class, 'index']);
    Route::get('/view-users', [PastorController::class, 'showUsers']);
    Route::get('/search-member', [PastorController::class, 'searchMemberDetails'])->name('pastor.searchMember');
    Route::get('/member-search', [PastorController::class, 'searchView']);
    Route::get('/member-searc', [PastorController::class, 'singleMember'])->name('pastor.singleMember');
    Route::get('/view-users', [PastorController::class, 'showUsers']);
    Route::get('/view-member/{id}',[PastorController::class,'showMember']);
    Route::get('/delete-member/{id}',[PastorController::class,'deleteMember']);
    Route::post('/add-member',[PastorController::class,'addMember'])->name('pastor.addMember');
});


Route::prefix('secretary')->middleware([AuthCheck::class])->group(function () { 
    Route::get('/home', [SecretaryController::class, 'index']);
});



//Accountant CONTROL Codes
Route::prefix('accountant')->middleware([AuthCheck::class])->group(function () {
    
    Route::get('/home', [AccountantController::class, 'index']);
    // Route::get('/home', [AuthController::class, 'login']);
    
}); 



//ADMINISTRATOR CONTROL CODES

Route::prefix('admin')->middleware([AdminCheck::class])->group(function () {
    
    Route::get('/home', [AdminController::class, 'index']);
    Route::get('/create-roles', [AdminController::class, 'roles']);
    Route::post('/create-roles', [AdminController::class, 'createRoles'])->name('create.roles');
    Route::get('/lecturer_search',[AdminController::class,'searchUser'])->name('search.lecturer');

    Route::get('/search_user',[AdminController::class,'searchUserDetails'])->name('search.user');

    Route::get('/singleUser',[AdminController::class,'singleUser']);

    Route::post('/store-roles',[AdminController::class,'storeRoles'])->name('roles.assign');

    Route::get('/view-accounts',[AdminController::class,'viewAccounts']);
    Route::post('/add-member',[AdminController::class,'addMember'])->name('admin.addMember');

    Route::get('/view-member/{id}',[AdminController::class,'showMember']);
    // Delete a Member
    Route::get('/delete-member/{id}',[AdminController::class,'deleteMember']);
    
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
