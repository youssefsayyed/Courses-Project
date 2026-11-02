<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use ImageUpload;

class StudentController extends Controller
{
    public function index()
    {
        $data = Student::all();
        //using helper function to send api
        return ApiResponse::send(200,true,'',$data);
    }

    public function store(CreateStudentRequest $request)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->age = $request->age;
        $student->address = $request->address;
        $student->phone = $request->phone;
        // image upload
         if($request->has('img')){
            //usin helper function
            $filename = ImageUpload::upload($request->img);
            $student->img = $filename;
         }
        $student->save();

        return ApiResponse::send(201,true,'You added a new Student',$student);

    }

    public function show($id)
    {
        $student = Student::find($id);
        if(empty($student)) {
            return ApiResponse::send(404,false,'Cannot find this Student');
        }
        return ApiResponse::send(200,true,'The Course is'.' '.$student->name,$student);
    }

    public function update(CreateStudentRequest $request ,$id)
    {
        $student = Student::find($id);
        if(empty($student)) {
            return ApiResponse::send(404,false,'Cannot find this Student');
        }
        $student->name = $request->name;
        $student->age = $request->age;
        $student->address = $request->address;
        $student->phone = $request->phone;
        //img
        if($request->has('img')){
            $imagePath = public_path('uploads/', $student->img);
            if(File::exists($imagePath)){
                File::delete($imagePath);
            }
            //usin helper function
            $filename = ImageUpload::upload($request->img);
            $student->img = $filename;
        }
        $student->save();
        return ApiResponse::send(200,true,'The Student is updated successfully',$student);

    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if(empty($student)) {
            return ApiResponse::send(404,false,'Cannot find this Student');
        }
        $student->delete();
        return ApiResponse::send(200,true,'The Student is Deleted',$student->name);

    }
}
