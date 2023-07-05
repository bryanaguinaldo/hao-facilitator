<?php

use App\Http\Controllers\AccountSettingsController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\ManageRolesController;
use App\Http\Controllers\AssignRolesController;
use App\Http\Controllers\HotdogController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\ProvincialDataController;
use App\Models\UsersInformation;
use Illuminate\Contracts\Auth\Access\Gate;

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

Route::post('/login', [LoginController::class, 'login'])->name('login.user');

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login_empty_url');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/refresh/patients', [DashboardController::class, 'store'])->name('dashboard.store');

    Route::get('/patients', [PatientsController::class, 'index'])->name('patients');
    Route::get('/patients/get/admitted', [PatientsController::class, 'renderAdmitted'])->name('patients.admitted');
    Route::get('/patients/get/released', [PatientsController::class, 'renderReleased'])->name('patients.released');

    // Easter Eggs
    Route::get('/secret/hotdognialjur', [HotdogController::class, 'index']);

    route::get('/data', [ProvincialDataController::class, 'index'])->name('provincial_data');

    Route::get('/settings', [AccountSettingsController::class, 'index'])->name('account_settings');
    Route::post('/settings', [AccountSettingsController::class, 'update'])->name('account_settings.update');

    Route::middleware('role:Administrator|Developer')->group(function () {
        Route::get('/users', [ManageUsersController::class, 'index'])->name('manage_users');
        Route::post('/users', [ManageUsersController::class, 'store'])->name('manage_users.store');
        Route::delete('/users/{id}', [ManageUsersController::class, 'destroy'])->name('manage_users.destroy');
        Route::patch('/users/update/{id}', [ManageUsersController::class, 'update'])->name('manage_users.update');
        Route::post('/users/edit/{id}', [ManageUsersController::class, 'edit'])->name('manage_users.edit');
        Route::post('/users/restore/{id}', [ManageUsersController::class, 'restore'])->name('manage_users.restore');
    });

    Route::middleware('role:Developer')->group(function () {
        Route::get('/roles', [ManageRolesController::class, 'index'])->name('manage_roles');

        Route::post('/roles/new/role', [ManageRolesController::class, 'storeRole'])->name('manage_roles.store_role');
        Route::post('/roles/new/permission', [ManageRolesController::class, 'storePermission'])->name('manage_roles.store_permission');

        Route::get('/roles/table/roles', [ManageRolesController::class, 'roles_table'])->name('manage_roles.roles_table');
        Route::get('/roles/table/permissions', [ManageRolesController::class, 'permissions_table'])->name('manage_roles.permissions_table');
    });

    Route::middleware('role:Administrator|Developer')->group(function () {
        Route::get('/facilities', [FacilitiesController::class, 'index'])->name('facilities');
    });

    Route::middleware('role:Developer')->group(function () {
        Route::get('/assignment', [AssignRolesController::class, 'index'])->name('assign_roles');
        Route::post('/assignment/role/{id}', [AssignRolesController::class, 'updateRole'])->name('assign_roles.update_role');
    });
});
