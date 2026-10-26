<?php

use App\Helpers\ApiResponse;
use App\Http\Controllers\Api\CourseController;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/student_api',function(){
    return response()->json([
        'student' => Student::all()
    ]);
});

Route::get('/courses_api',function(){
    $data = Course::all();
    return ApiResponse::send(200,true,'msg',$data);
});

Route::apiResource('courses',CourseController::class);