<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

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
            $photo = $request->img;
            $extension = strtolower($photo->extension());
            $filename = time().rand(1,1000).".".$extension;
            $photo->move('uploads',$filename);
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
        $data = Student::find($id);
        if(empty($data)){
            return redirect()->back()->with(['error'=>'This Student cannot be edited']);
        }
        $data->name = $request->name;
        $data->age = $request->age;
        $data->address = $request->address;
        $data->phone = $request->phone;
       // image edit
        if($request->has('img')){
            $photo = $request->img;
            $extension = strtolower($photo->extension());
            $filename = time().rand(1,1000).".".$extension;
            $photo->move('uploads',$filename);
            $data->img = $filename;
        }
        $data->save();
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
