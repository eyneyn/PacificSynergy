<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersControllers;

Route::get('/',[HomeController::class,'index']);


Route::get('login',[AuthController::class,'login']);
Route::post('login_post',[AuthController::class,'login_post'])->name('login_post');


//Admin
Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/index',[DashboardController::class,'index']);

    // Admin Route to manage user registration
    Route::get('registration',[AuthController::class,'registration']);
    Route::post('registration_post',[AuthController::class,'registration_post'])->name('registration_post');
    
    // Users list
    Route::get('admin/index',[UsersControllers::class,'index'])->name('admin.index');

    //Update
    Route::get('admin/userUpdate/{id}', [UsersControllers::class, 'edit'])->name('admin.userEdit'); // Show form
    Route::put('admin/userUpdate/{id}', [UsersControllers::class, 'update'])->name('admin.userUpdate'); // Submit update

        // Production Report Route
    Route::get('report/productionReport', function () {
        return view('report.productionReport');
    })->name('report.productionReport');
});

//Manager
Route::group(['middleware' => 'manager'], function () {
    Route::get('manager/index',[DashboardController::class,'index']);
});

//Analyst
Route::group(['middleware' => 'analyst'], function () {
        Route::get('analyst/index',[DashboardController::class,'index']);
});

//Senior
Route::group(['middleware' => 'senior'], function () {
        Route::get('senior/index',[DashboardController::class,'index']);
});

//Forgot password
Route::get('forgot',[AuthController::class,'forgot']);
Route::post('forgot_post',[AuthController::class,'forgot_post']);

//Reset 
Route::get('reset/{token}',[AuthController::class, 'getReset']);
Route::post('reset_post/{token}',[AuthController::class,'postReset'])->name('reset_post');

//Logout
Route::get('logout',[AuthController::class,'logout'])->name('logout');