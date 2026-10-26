@extends('master')

@section('title')
    Add Student
@endsection

@section('page_name')
    Adding Student
@endsection

@section('page_name2')
    Students 
@endsection

@section('content')

    <div class="card-header">
      <h3 class="card-title text-center" style="float: none;">Add Student</h3>
     </div>

   

    <div class="card col-8 mx-auto mt-5">
         @if(Session::has('error'))
            <div class="alert alert-error">
                {{Session::get('error')}}
            </div>
        @endif

         <form role="form" method="POST" enctype="multipart/form-data" action="{{route('students.store')}}">
            @csrf
                <div class="card-body">
                  <div class="form-group">
                        <label >Student Name</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter Student Name" value="{{old('name')}}">
                        @error('name')
                            <span style="color: red">{{$message}}</span>
                        @enderror
                  </div>
                  <div class="form-group">
                        <label >Student Age</label>
                        <input type="text" class="form-control" name="age"  placeholder="Enter Student Age" value="{{old('age')}}">
                        @error('age')
                            <span style="color: red">{{$message}}</span>
                        @enderror
                  </div>
                  <div class="form-group">
                        <label >Student Address</label>
                        <input type="text" class="form-control" name="address"  placeholder="Enter Student Address" value="{{old('address')}}">
                        @error('address')
                            <span style="color: red">{{$message}}</span>
                        @enderror
                  </div>
                  <div class="form-group">
                        <label >Student Phone</label>
                        <input type="text" class="form-control" name="phone"  placeholder="Enter Student Phone" value="{{old('phone')}}">
                        @error('phone')
                            <span style="color: red">{{$message}}</span>
                        @enderror
                  </div>
                  <div class="form-group">
                        <label >Student Image</label>
                        <input type="file" class="form-control" name="img"  placeholder="Enter Student Image" >
                  </div>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary mr-3">Submit</button>
                </div>
              </form>

    </div>



@endsection