@extends('master')

@section('title')
    Students
@endsection


@section('page_name')
    Students Page
@endsection

@section('page_name2')
    Students 
@endsection

@section('content')

        <div class="card-header">
                <h3 class="card-title text-center" style="float: none;">All Students</h3>
        </div>

        <div class="m-2">
            <a href="{{route('students.create')}}" class="btn btn-primary">Add Student</a>
        </div>

       <div class="card-body">
           @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-success">
                    {{Session::get('error')}}
                </div>
            @endif
                <table class="table table-bordered">
                    @if(@isset($data) and !@empty($data) and @count($data) > 0)
                        
                        <thead>                  
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Age</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Control</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach ($data as $data)
                           
                            <tr>
                                <td class="text-center align-middle">{{$data->name}}</td>
                                <td class="text-center align-middle">{{$data->age}}</td>
                                <td class="text-center align-middle">{{$data->address}} </td>
                                <td class="text-center align-middle">{{$data->phone}} </td>
                                <td class="text-center" width="50px" height="30px"><img src="{{asset('uploads/'.$data->img)}}" class="img-fluid" ></td>
                                <td class="text-center align-middle" width="15%">
                                    <a href="{{route('students.edit',$data->id)}}" class="btn btn-success" >Edit</a>
                                    <form action="{{route('students.destroy',$data->id)}}" method="post" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>

                         @endforeach
                            
                        </tbody>
                        
                        
                    @else
                        
                        <h4 class="text-center" style="color: red">No Data to be Showed</h4>
                 

                    @endif

                </table>
              </div>

@endsection