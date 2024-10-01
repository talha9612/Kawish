<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\mapcontroller;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Auth;

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


Route::get('/index', [mapcontroller::class, 'index']);

Route::get('/punjab', [mapcontroller::class, 'punjab']);

Route::get('/kpk', [mapcontroller::class, 'kpk']);

Route::get('/bal', [mapcontroller::class, 'bal']);

Route::get('/sindh', [mapcontroller::class, 'sindh']);
Route::get('/get-total-counts-by-region', [ProjectController::class, 'getTotalCountsByRegion']);

Route::get('/get-all-punjab-setup-count', [ProjectController::class, 'getAllPunjabSetupCounts']);
Route::get('/get-all-kpk-setup-count', [ProjectController::class, 'getAllkpkSetupCounts']);
Route::get('/get-all-sindh-setup-count', [ProjectController::class, 'getAllsindhSetupCounts']);
Route::get('/get-all-bal-setup-count', [ProjectController::class, 'getAllbalSetupCounts']);

Route::get('/total-handpump-setups', [ProjectController::class, 'getTotalHandPumpSetupsCount'])->name('total.handpump.setups');
Route::get('/total-new-well-setups', [ProjectController::class, 'getTotalNewWellSetupsCount'])->name('total.newwell.setups');
Route::get('/total-repair-well-setups', [ProjectController::class, 'getTotalRepairWellSetupsCount'])->name('total.repairwell.setups');


Route::get('/head-handpump-setups', [ProjectController::class, 'getheadHandPumpSetupsCount'])->name('head.handpump.setups');
Route::get('/head-new-well-setups', [ProjectController::class, 'getheadNewWellSetupsCount'])->name('head.newwell.setups');
Route::get('/head-repair-well-setups', [ProjectController::class, 'getheadRepairWellSetupsCount'])->name('head.repairwell.setups');

Route::get('/head-counts', [ProjectController::class, 'headCount'])->name('head.counts');

Route::get('/punjper', [ProjectController::class, 'punjper']);
Route::get('/kpkper', [ProjectController::class, 'kpkper']);
Route::get('/balper', [ProjectController::class, 'balper']);
Route::get('/sindhper', [ProjectController::class, 'sindhper']);



// Route::get('/get-punjab-setup-count', [mapcontroller::class,'getPunjabSetupCounts']);
// Route::get('/get-sindh-setup-count', [mapcontroller::class,'getsindhSetupCounts']);
// Route::get('/get-bal-setup-count', [mapcontroller::class,'getbalSetupCounts']);
// Route::get('/get-kpk-setup-count', [mapcontroller::class,'getkpkSetupCounts']);


Auth::routes();


Route::get('/login/admin', 'App\Http\Controllers\Auth\LoginController@showAdminLoginForm');
Route::get('/login/donor', 'App\Http\Controllers\Auth\LoginController@showDonorLoginForm');
Route::get('/register/admin', 'App\Http\Controllers\Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/donor', 'App\Http\Controllers\Auth\RegisterController@showDonorRegisterForm');

Route::post('/login/admin', 'App\Http\Controllers\Auth\LoginController@adminLogin');
Route::post('/login/donor', 'App\Http\Controllers\Auth\LoginController@DonorLogin');
Route::post('/register/admin', 'App\Http\Controllers\Auth\RegisterController@createAdmin');
Route::post('/register/donor', 'App\Http\Controllers\Auth\RegisterController@createDonor');



// For Admin
Route::middleware('auth:admin')->group(function () {
    Route::view('/admin', 'admin.dashboard.index');

    // Surveyed Routes
    Route::get('/admin/surveyed', [App\Http\Controllers\Admin\SurveyedController::class, 'index']);
    Route::post('/admin/save-surveyed', [App\Http\Controllers\Admin\SurveyedController::class, 'SaveSurveyed'])->name('save.surveyed');
    Route::get('/admin/get-surveyed-details/{id}', [App\Http\Controllers\Admin\SurveyedController::class, 'getSurveyedDetails']);
    Route::post('/admin/surveyed-edit/{id}', [App\Http\Controllers\Admin\SurveyedController::class, 'editSurveyed'])->name('surveyed.edit');
    Route::post('/admin/surveyed-update/{id}', [App\Http\Controllers\Admin\SurveyedController::class, 'updateSurveyed'])->name('surveyed.update');
    Route::post('/admin/surveyed/delete/{id}', [App\Http\Controllers\Admin\SurveyedController::class, 'delete'])->name('surveyed.delete');
    Route::post('/admin/surveyed-image/delete/{id}', [App\Http\Controllers\Admin\SurveyedController::class, 'Imagedelete'])->name('remove.image');

    // Projects Routes
    Route::get('/admin/project', [App\Http\Controllers\Admin\ProjectController::class, 'index']);
    Route::post('/admin/project/add/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'add']);
    Route::post('/admin/project/store', [App\Http\Controllers\Admin\ProjectController::class, 'store'])->name('project.store');
    Route::post('/admin/project-edit/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'editProject'])->name('project.edit');
    Route::post('/admin/project-update/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'updateProject'])->name('project.update');
    Route::post('/admin/project/delete/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'delete'])->name('project.delete');
    Route::post('/admin/project/details/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'getProjectDetails'])->name('project.view');
    Route::post('/admin/project-surveyed-image/delete/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'surveyedImagedelete']);
    Route::post('/admin/project-current-working-image/delete/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'currentWorkingImagedelete']);
    Route::post('/admin/project-snap-working-image/delete/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'snapWorkingImagedelete']);

    // Donor Routes
    Route::resource('admin/donors','App\Http\Controllers\Admin\DonorController');
    // Define only the routes you need
    Route::resource('admin/users', 'App\Http\Controllers\Admin\UserController');
    Route::resource('admin/profile', 'App\Http\Controllers\Admin\ProfileController');
    Route::post('admin/profile/update', [App\Http\Controllers\Admin\ProfileController::class, 'userUpdate']);
});

Route::middleware('auth:donor')->group(function () {
    Route::view('/donor', 'donor.dashboard.index');

    Route::get('/donor/surveyed', [App\Http\Controllers\Donor\SurveyedController::class, 'index']);
    Route::get('/donor/get-surveyed-details/{id}', [App\Http\Controllers\Donor\SurveyedController::class, 'getSurveyedDetails']);

    Route::get('/donor/project', [App\Http\Controllers\Donor\ProjectController::class, 'index']);
    Route::post('/donor/details/{id}', [App\Http\Controllers\Donor\ProjectController::class, 'getProjectDetails']);

    Route::get('donor/profile', [App\Http\Controllers\Donor\ProfileController::class, 'index']);
    Route::get('donor/profile/{id}', [App\Http\Controllers\Donor\ProfileController::class, 'edit']);
    Route::post('donor/profile-update', [App\Http\Controllers\Donor\ProfileController::class, 'update']);
});

Route::middleware('auth')->group(function () {
    Route::view('/home', 'home');

    Route::get('/surveyed', [App\Http\Controllers\SurveyedController::class, 'index']);
    Route::get('/get-surveyed-details/{id}', [App\Http\Controllers\SurveyedController::class, 'getSurveyedDetails']);
    Route::post('/save-surveyed', [App\Http\Controllers\SurveyedController::class, 'SaveSurveyed']);
    Route::post('/surveyed-edit/{id}', [App\Http\Controllers\SurveyedController::class, 'editSurveyed']);
    Route::post('/surveyed-update/{id}', [App\Http\Controllers\SurveyedController::class, 'updateSurveyed']);
    Route::post('/surveyed-image/delete/{id}', [App\Http\Controllers\SurveyedController::class, 'Imagedelete']);

    Route::get('/project', [App\Http\Controllers\ProjectController::class, 'index']);
    Route::post('/details/{id}', [App\Http\Controllers\ProjectController::class, 'getProjectDetails']);
    Route::post('/project/add/{id}', [App\Http\Controllers\ProjectController::class, 'add']);
    Route::post('/project/store', [App\Http\Controllers\ProjectController::class, 'store']);

    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index']);
    Route::get('/profile/{id}', [App\Http\Controllers\ProfileController::class, 'edit']);
    Route::post('/profile-update', [App\Http\Controllers\ProfileController::class, 'update']);
});
