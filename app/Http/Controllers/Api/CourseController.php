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

    public function show($id)
    {
        $course = Course::find($id);
        if(empty($course)) {
            return ApiResponse::send(404,false,'Cannot find this Course');
        }
        return ApiResponse::send(200,true,'The Course is'.' '.$course->name,$course);
    }

    public function update(CreateCourseRequest $request ,$id)
    {
        $course = Course::find($id);
        if(empty($course)) {
            return ApiResponse::send(404,false,'Cannot find this Course');
        }
        $course->name = $request->name;
        $course->save();
        return ApiResponse::send(200,true,'The Course is updated successfully');

    }

    public function destroy($id)
    {
        $course = Course::find($id);
        if(empty($course)) {
            return ApiResponse::send(404,false,'Cannot find this Course');
        }
        $course->delete();
        return ApiResponse::send(200,true,'The Course is Deleted',$course->name);

    }
}
