<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use ImageUpload;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Student::all();
        return view('students.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateStudentRequest $request)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->age = $request->age;
        $student->address = $request->address;
        $student->phone = $request->phone;
    // image upload
        if($request->has('img')){
            //using helper function
            $filename = ImageUpload::upload($request->img);
            $student->img = $filename;
        }
        $student->save();
        return redirect()->route('students.index')->with(['success'=>'You have added a new student']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Student::find($id);
        if(empty($data)){
            return redirect()->back()->with(['error'=>'This Student cannot be reached']);
        }
        return view('students.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateStudentRequest $request, $id)
    {
        $student = Student::find($id);
        if(empty($student)){
            return redirect()->back()->with(['error'=>'This Student cannot be edited']);
        }
        $student->name = $request->name;
        $student->age = $request->age;
        $student->address = $request->address;
        $student->phone = $request->phone;
       // image edit
        if($request->has('img')){
            if($student->img){
                $imagePath = public_path('uploads/' . $student->image);
                if(File::exists($imagePath)) {
                    File::delete($imagePath);
                } 
            }
            $filename = ImageUpload::upload($request->img);
            $student->img = $filename;
        }
        $student->save();
        return redirect()->route('students.index')->with(['success'=>'The Student is updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Student::find($id);
        if(empty($data)){
            return redirect()->back()->with(['error'=>'This Student cannot be reached']);
        }
        $data->delete();
        return redirect()->route('students.index')->with(['success'=>'The Student is Deleted']);
    }
}
