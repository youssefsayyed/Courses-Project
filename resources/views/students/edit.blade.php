@extends('master')

@section('title')
    Edit Student
@endsection

@section('page_name')
    Editing Student
@endsection

@section('page_name2')
    Student 
@endsection

@section('content')

    <div class="card-header">
      <h3 class="card-title text-center" style="float: none;">Edit Student</h3>
     </div>

   

    <div class="card col-8 mx-auto mt-5">
         @if(Session::has('error'))
            <div class="alert alert-error">
                {{Session::get('error')}}
            </div>
        @endif

         <form role="form" method="POST" enctype="multipart/form-data" action="{{route('students.update',$data->id)}}">
            @csrf
            @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label >Student Name</label>
                    <input type="text" class="form-control" name="name"   value="{{old('name',$data->name)}}">
                    @error('name')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                  </div>
                    <div class="form-group">
                        <label >Student Age</label>
                        <input type="text" class="form-control" name="age"  placeholder="Enter Student Age" value="{{old('age',$data->age)}}">
                        @error('age')
                            <span style="color: red">{{$message}}</span>
                        @enderror
                  </div>
                  <div class="form-group">
                        <label >Student Address</label>
                        <input type="text" class="form-control" name="address"  placeholder="Enter Student Address" value="{{old('address',$data->address)}}">
                        @error('address')
                            <span style="color: red">{{$message}}</span>
                        @enderror
                  </div>
                  <div class="form-group">
                        <label >Student Phone</label>
                        <input type="text" class="form-control" name="phone"  placeholder="Enter Student Phone" value="{{old('phone',$data->phone)}}">
                        @error('phone')
                            <span style="color: red">{{$message}}</span>
                        @enderror
                  </div>
                  <div class="form-group">
                        <label >Student Image</label>
                        <img src="{{asset('uploads/'.$data->img)}}" width="50px" height="50" class="d-block my-2">
                        <input type="file" class="form-control" name="img"  placeholder="Enter Student Image">
                  </div>
                </div>
                

                <div class="form-group">
                  <button type="submit" class="btn btn-primary mr-3">Submit</button>
                </div>
              </form>

    </div>



@endsection