<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\HodController;
use App\Http\Controllers\JointdirectorController;
use App\Http\Controllers\NehController;
use App\Http\Controllers\ScspController;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\TrainingcellController;
use App\Http\Controllers\TspController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebPagesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/training-programme', [WebPagesController::class, 'trainingProgramme'])->name('trainingProgramme');
Route::get('/programme-details', [WebPagesController::class, 'programmeDetails'])->name('programmeDetails');
Route::get('/trainees-login', [WebPagesController::class, 'traineesLogin'])->name('traineesLogin');
Route::get('/trainees-registration', [WebPagesController::class, 'traineesRegistration'])->name('traineesRegistration');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('adminDashboard');
Route::get('/coordinator/dashboard', [CoordinatorController::class, 'dashboard'])->name('coordinatorDashboard');
Route::get('/director/dashboard', [DirectorController::class, 'dashboard'])->name('directorDashboard');
Route::get('/hod/dashboard', [HodController::class, 'dashboard'])->name('hodDashboard');
Route::get('/joint-director/dashboard', [JointdirectorController::class, 'dashboard'])->name('jointDirectorDashboard');
Route::get('/neh/dashboard', [NehController::class, 'dashboard'])->name('nehDashboard');
Route::get('/sc-sp/dashboard', [ScspController::class, 'dashboard'])->name('scspDashboard');
Route::get('/trainee/dashboard', [TraineeController::class, 'dashboard'])->name('traineeDashboard');
Route::get('/training-cell/dashboard', [TrainingcellController::class, 'dashboard'])->name('trainingCellDashboard');
Route::get('/tsp/dashboard', [TspController::class, 'dashboard'])->name('tspDashboard');
Route::get('/sign-in', [AuthController::class, 'login'])->name('login');
Route::get('/forget-password', [AuthController::class, 'forgetPassword'])->name('forgetPassword');



// Training Management Information System

Route::get('/admin/list-training-programme', [AdminController::class, 'listTrainingProgramme'])->name('adminListTrainingProgramme');
Route::get('/admin/add-training-programme', [AdminController::class, 'addTrainingProgramme'])->name('adminAddTrainingProgramme');
Route::post('/admin/save-training-programme', [AdminController::class, 'saveTrainingProgramme'])->name('adminSaveTrainingProgramme');
Route::get('/admin/edit-training-programme/{id}', [AdminController::class, 'editTrainingProgramme'])->name('adminEditTrainingProgramme');
Route::post('/admin/update-training-programme', [AdminController::class, 'updateTrainingProgramme'])->name('adminUpdateTrainingProgramme');
Route::get('/admin/view-training-programme/{id}', [AdminController::class, 'viewTrainingProgramme'])->name('adminViewTrainingProgramme');
Route::post('/admin/update-status-training-programme', [AdminController::class, 'updateStatusTrainingProgramme'])->name('adminUpdateStatusTrainingProgramme');

// registration list
Route::get('/admin/list-users', [AdminController::class, 'listUsers'])->name('adminListUsers');
Route::get('/admin/add-users', [AdminController::class, 'addUsers'])->name('adminAddUsers');
Route::post('/admin/save-users', [AdminController::class, 'saveUsers'])->name('adminSaveUsers');
Route::get('/admin/edit-users/{id}', [AdminController::class, 'editUsers'])->name('adminEditUsers');
Route::post('/admin/update-users', [AdminController::class, 'updateUsers'])->name('adminupdateUsers');

// categories
Route::get('/admin/list-category', [CategoryController::class, 'listCategory'])->name('adminListCategory');
Route::get('/admin/add-category', [CategoryController::class, 'addCategory'])->name('adminAddCategory');
Route::post('/admin/save-category', [CategoryController::class, 'saveCategory'])->name('adminSaveCategory');
Route::get('/admin/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('adminEditCategory');
Route::post('/admin/update-category', [CategoryController::class, 'updateCategory'])->name('adminUpdateCategory');
Route::post('/admin/update-status-category', [CategoryController::class, 'updateStatusCategory'])->name('adminUpdateStatusCategory');
// roles
Route::get('/admin/list-role', [RoleController::class, 'listRole'])->name('adminListRole');
Route::get('/admin/add-role', [RoleController::class, 'addRole'])->name('adminAddRole');
Route::post('/admin/save-role', [RoleController::class, 'saveRole'])->name('adminSaveRole');
Route::get('/admin/edit-role/{id}', [RoleController::class, 'editRole'])->name('adminEditRole');
Route::post('/admin/update-role', [RoleController::class, 'updateRole'])->name('adminUpdateRole');
Route::post('/admin/update-status-role', [RoleController::class, 'updateStatusRole'])->name('adminUpdateStatusRole');





