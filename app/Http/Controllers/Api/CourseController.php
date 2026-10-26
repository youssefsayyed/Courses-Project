<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $data = Course::all();
        //using helper function to send api
        return ApiResponse::send(200,true,'',$data);
    }

    public function store(CreateCourseRequest $request)
    {
        $counter = Course::where('name',$request->name)->count();
        if($counter>0){
           return ApiResponse::send(422,false,'This name already exists');
        }
        $course = new Course();
        $course->name = $request->name;
        $course->save();

           return ApiResponse::send(201,true,'You added a new course',$course);

    }
}
