<?php

use App\Helpers\ApiResponse;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\StudentController;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::apiResource('courses_api',CourseController::class);
// Route::apiResource('students_api',StudentController::class);

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('logout',[AuthController::class,'logout']);
    Route::apiResource('courses_api',CourseController::class);
    Route::apiResource('students_api',StudentController::class);
});
