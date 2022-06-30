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
use App\Http\Controllers\EventController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CommiteeController;
use App\Http\Controllers\ContributionsController;
use App\Http\Controllers\Controller;
use GuzzleHttp\Middleware;
use App\Http\Middleware\Authcheck;
use App\Http\Middleware\Pastorcheck;
use App\Http\Middleware\Admincheck;
use App\Http\Middleware\Parishcheck;
use App\Http\Middleware\Accountantcheck;
use App\Http\Middleware\Evangecheck;
use App\Http\Middleware\Secretarycheck;


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
    
    return view('auth.login');
});

Route::get('/data', [UserController::class, 'chartData']);

Route::get('/test', function () {
    
    return view('test');
});



//NORMAL USER CONTROL CODES
Route::prefix('user')->group(function () { 
    Route::get('/insert', [UserController::class, 'create']);
    Route::get('/profile', [UserController::class, 'showProfile']);
    Route::post('/profile/{id}', [UserController::class, 'editProfile'])->name('profile.settings');

    });

//Roles CONTROL CODES
Route::get('/role/insert', [RoleController::class, 'create']);
Route::get('/gett/user', [RoleController::class, 'store']);


//EVANGELIST CONTROL CODES
Route::prefix('evangelist')->middleware('EvangeCheck')->group(function () { 
    Route::get('/home', [EvangelistController::class, 'index']);
    Route::get('/projects', [EvangelistController::class, 'showProject']);
    Route::get('/plans', [EvangelistController::class, 'showPlans']);
    //EVENTS MANAGEMENT
    Route::get('/events', [EventController::class, 'index']);
    Route::get('/sacraments', [EventController::class, 'showSacraments']);
    
});

//PARISH WORKER CONTROL CODES
Route::prefix('parish')->middleware('ParishCheck')->group(function () { 
    Route::get('/home', [ParishController::class, 'index']);
});

//PASTOR CONTROL CODES
Route::prefix('pastor')->middleware('PastorCheck')->group(function () { 
    Route::get('/home', [PastorController::class, 'index']);
    Route::get('/view-users', [PastorController::class, 'showUsers']);
    Route::get('/search-member', [PastorController::class, 'searchMemberDetails'])->name('pastor.searchMember');
    Route::get('/member-search', [PastorController::class, 'searchView']);
    // Route::get('/member-searc', [PastorController::class, 'singleMember'])->name('pastor.singleMember');
    // Route::get('/view-users', [PastorController::class, 'showUsers']);
    Route::get('/viewMember/{id}',[PastorController::class,'showSingleMember'])->name('pastor.singleMember');;
    Route::get('/delete-member/{id}',[PastorController::class,'deleteMember'])->name('pastor.deleteMember');
    
    Route::get('/delete-member/{id}',[PastorController::class,'deleteMember'])->name('pastor.deleteMember');
    Route::post('/add-member',[PastorController::class,'addMember'])->name('pastor.addMember');
    Route::get('/approve-user/{id}',[PastorController::class,'approve'])->name('pastor.approve');


    // CREATING COMMITEES
    Route::get('/create_commitee', [CommiteeController::class, 'index']);
    Route::post('/commitee-create', [CommiteeController::class, 'createCommitee'])->name('create.category');
    Route::get('/search_commitee', [CommiteeController::class, 'searchMember'])->name('search_member');

    Route::post('/assign_member_commitee', [CommiteeController::class, 'storeCommiteeMember'])->name('commitee.assign');
    Route::get('/delete_commitee/{id}', [CommiteeController::class, 'deleteCommitee'])->name('pastor.deleteCommitee');
    Route::get('/view_commitee/{id}', [CommiteeController::class, 'viewCommitee']);
    

    Route::get('/pdf',[PastorController::class,'generatePDF']);
});

//CONGREGATION SECRETARY CONTROL CODES
Route::prefix('secretary')->middleware('SecretaryCheck')->group(function () { 
    Route::get('/home', [SecretaryController::class, 'index']);
});



//Accountant CONTROL Codes
Route::prefix('accountant')->middleware('AccountantCheck')->group(function () {
    
    Route::get('/home', [AccountantController::class, 'index']);
    Route::get('/show-resources', [AccountantController::class, 'showResources']);
    Route::post('/resource/submit', [AccountantController::class, 'submitResources'])->name('resources.submit');
    Route::get('/resource/delete/{id}', [AccountantController::class, 'deleteResources'])->name('resource.delete');



    Route::get('/pdf',[AccountantController::class,'generatePDF']);

    Route::get('/contributions', [ContributionsController::class, 'index']);

    Route::get('/member_contribute', [ContributionsController::class, 'searchContributingMember']);
    Route::post('/save_contribution', [ContributionsController::class, 'saveContribution'])->name('contribution.submit');

    Route::get('/delete_contribution/{id}', [ContributionsController::class, 'deleteContribution']);


    
    // Route::get('/home', [AuthController::class, 'login']);
    
}); 



//ADMINISTRATOR CONTROL CODES

Route::prefix('admin')->middleware('AdminCheck')->group(function () {
    
    Route::get('/home', [AdminController::class, 'index']);
    Route::get('/create-roles', [AdminController::class, 'roles']);
    Route::post('/create-roles', [AdminController::class, 'createRoles'])->name('create.roles');
    Route::get('/lecturer_search',[AdminController::class,'searchUser'])->name('search.lecturer');

    Route::get('/search_user',[AdminController::class,'searchUserDetails'])->name('search.user');

    Route::get('/singleUser',[AdminController::class,'singleUser']);

    Route::post('/store-roles',[AdminController::class,'storeRoles'])->name('roles.assign');

    Route::get('/view-accounts',[AdminController::class,'viewAccounts']);

    // Route::get('/approve-user/{id}',[AdminController::class,'viewAccounts'])->name('admin.approve');
    Route::post('/add-member',[AdminController::class,'addMember'])->name('admin.addMember');

    Route::get('/view-member/{id}',[AdminController::class,'showMember']);
    // Delete a Member
    Route::get('/delete-member/{id}',[AdminController::class,'deleteMember']);
    
    Route::get('/pdf', [AdminController::class, 'createPDF']);
    // Route::get('/home', [AdminController::class, 'index']);
    // Route::get('/home', [AuthController::class, 'login']);

    Route::get('/edit-roles/{id}', [AdminController::class, 'editRoles'])->name('edit.roles');   
    Route::get('/delete-roles/{id}', [AdminController::class, 'deleteRoles'])->name('delete.roles');   
    
}); 


// Authentication control codes
Route::get('/login', [AuthController::class, 'login']);
Route::get('/Auth', [AuthController::class, 'index']);

Route::get('/user-logout', [AuthController::class,'logout'])->name('user-logout');

Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.custom');


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Importing Excel file
Route::get('/importExcel', [ImportController::class, 'index']);
Route::post('/import', [ImportController::class, 'create'])->name('test.import');

// Route::get('/pdf', [PDFController::class, 'index']);




Route::get('/test', [TestController::class, 'index']);
Route::get('/test/pdf', [TestController::class, 'createPDF']);