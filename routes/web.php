<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersControllers;
use App\Http\Controllers\ProductionReportController;

// Public Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('login', [AuthController::class, 'login']);
Route::post('login_post', [AuthController::class, 'login_post'])->name('login_post');

// Forgot/Reset Password
Route::get('forgot', [AuthController::class, 'forgot']);
Route::post('forgot_post', [AuthController::class, 'forgot_post']);
Route::get('reset/{token}', [AuthController::class, 'getReset']);
Route::post('reset_post/{token}', [AuthController::class, 'postReset'])->name('reset_post');

// Logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// ========================
// Admin Routes
// ========================
Route::middleware('admin')->group(function () {
    Route::get('admin/index', [DashboardController::class, 'index'])->name('admin.index');

    // User registration
    Route::get('registration', [AuthController::class, 'registration'])->name('admin.registration');
    Route::post('registration_post', [AuthController::class, 'registration_post'])->name('registration_post');

    // Users list
    Route::get('admin/index',[UsersControllers::class,'index'])->name('admin.index');

    // User management
    Route::get('admin/user_update/{id}', [UsersControllers::class, 'edit']);
    Route::put('admin/user_update/{id}', [UsersControllers::class, 'update'])->name('admin.user_update');

    // Full access to production reports
    Route::get('add_production', [ProductionReportController::class, 'add_production']);
    Route::post('productionreport_post', [ProductionReportController::class, 'productionreport_post']);
    Route::get('report/edit_report/{id}', [ProductionReportController::class, 'edit']);
    Route::put('report/edit_report/{id}', [ProductionReportController::class, 'edit_report'])->name('report.edit_report');
    Route::post('report/verify', [ProductionReportController::class, 'verify'])->name('report.verify');

    Route::post('report/download-pdf', [ProductionReportController::class, 'downloadPDF'])->name('download-pdf');  
});

// ========================
// Shared Report Access for Authenticated Roles
// ========================
Route::middleware(['auth', 'can_view_reports'])->group(function () {
    Route::get('report/production_report', [ProductionReportController::class, 'index'])->name('report.production_report');
    Route::get('report/view_report/{id}', [ProductionReportController::class, 'view_report'])->name('report.view_report');

    // Full access to production reports
    Route::get('add_production', [ProductionReportController::class, 'add_production']);
    Route::post('productionreport_post', [ProductionReportController::class, 'productionreport_post']);
    Route::get('report/edit_report/{id}', [ProductionReportController::class, 'edit']);
    Route::put('report/edit_report/{id}', [ProductionReportController::class, 'edit_report'])->name('report.edit_report');

    Route::post('report/download-pdf', [ProductionReportController::class, 'downloadPDF'])->name('download-pdf');    
});

// ========================
// Manager Routes
// ========================
Route::middleware('manager')->group(function () {
    Route::get('manager/index', [DashboardController::class, 'index'])->name('manager.index');
});

// ========================
// Analyst Routes
// ========================
Route::middleware('analyst')->group(function () {
    Route::get('analyst/index', [DashboardController::class, 'index'])->name('analyst.index');
});

// ========================
// Senior Routes
// ========================
Route::middleware('senior')->group(function () {
    Route::get('senior/index', [DashboardController::class, 'index'])->name('senior.index');
});
