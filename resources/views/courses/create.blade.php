@extends('master')

@section('title')
    Add Cousre
@endsection

@section('page_name')
    Adding Course
@endsection

@section('page_name2')
    Cousres 
@endsection

@section('content')

    <div class="card-header">
      <h3 class="card-title text-center" style="float: none;">Add Course</h3>
     </div>

   

    <div class="card col-8 mx-auto mt-5">
         @if(Session::has('error'))
            <div class="alert alert-error">
                {{Session::get('error')}}
            </div>
        @endif

         <form role="form" method="POST" action="{{route('courses.store')}}">
            @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label >Course Name</label>
                    <input type="text" class="form-control" name="name"  placeholder="Enter Course Name" value="{{old('name')}}">
                    @error('name')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary mr-3">Submit</button>
                </div>
              </form>

    </div>



@endsection