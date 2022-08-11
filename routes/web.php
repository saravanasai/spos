<?php

use App\Http\Controllers\Authentication\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Settings\SettingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\ChangePassword;
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

Route::get('/', [AuthController::class, 'index']);

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('employee-login', [AuthController::class, 'employeeLogin'])->name('employee-login');





Route::group(['middleware' => 'isAuthenticated', 'prefix' => 'dashboard'], function () {

    //setting dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //setting route
    Route::group(['prefix' => 'settings', 'as' => 'setting.'], function () {

        Route::get('employee-management', [SettingController::class, 'employeeManagementIndex'])->name('employee-management');
        Route::get('change-password', [SettingController::class, 'changePasswordIndex'])->name('change-password');




    });

    //logout route
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
