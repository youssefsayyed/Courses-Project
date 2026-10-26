<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Course::all();
        return view('courses.index',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCourseRequest $request)
    {
        $counter = Course::where('name',$request->name)->count();
        if($counter>0){
            return redirect()->back()->with(['error'=>'This name is already exist']);
        }
        $course = new Course();
        $course->name = $request->name;
        $course->save();
        return redirect()->route('courses.index')->with(['success'=>'You have added a new course']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Course::find($id);
        if(empty($data)){
            return redirect()->back()->with(['error'=>'This course cannot be edited']);
        }
        return view('courses.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateCourseRequest $request, $id)
    {
        $data = Course::find($id);
        if(empty($data)){
            return redirect()->back()->with(['error'=>'This course cannot be reached']);
        }
        $data->name = $request->name;
        $data->save();
        return redirect()->route('courses.index')->with(['success'=>'The Course is updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Course::find($id);
        if(empty($data)){
            return redirect()->back()->with(['error'=>'This course cannot be reached']);
        }
        $data->delete();
        return redirect()->route('courses.index')->with(['success'=>'The Course is Deleted']);
    }
}
