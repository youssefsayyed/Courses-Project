<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home');
Route::resource('courses',CourseController::class);
Route::resource('students',StudentController::class);

Route::middleware('guest')->group(function(){
    Route::get('register',[AuthController::class,'showRegister'])->name('register');    
    Route::post('register',[AuthController::class,'register']);    
    Route::get('login',[AuthController::class,'showLogin'])->name('login');
    Route::post('login',[AuthController::class,'login']);
    
});

Route::middleware('auth')->group(function() {
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::resource('courses',CourseController::class);
    Route::resource('students',StudentController::class);
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});