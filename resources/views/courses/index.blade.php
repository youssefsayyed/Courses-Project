@extends('master')

@section('title')
    Cousres
@endsection


@section('page_name')
    Cousres Page
@endsection

@section('page_name2')
    Cousres 
@endsection

@section('content')

        <div class="card-header">
                <h3 class="card-title text-center" style="float: none;">All Courses</h3>
        </div>

        <div class="m-2">
            <a href="{{route('courses.create')}}" class="btn btn-primary">Add Course</a>
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
                                <th class="text-center">Created At</th>
                                <th class="text-center">Updated At</th>
                                <th class="text-center">Control</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach ($data as $data)
                           
                            <tr>
                                <td class="text-center">{{$data->name}}</td>
                                <td class="text-center">{{$data->created_at}}</td>
                                <td class="text-center">{{$data->updated_at}} </td>
                                <td class="text-center" width="15%">
                                    <a href="{{route('courses.edit',$data->id)}}" class="btn btn-success" >Edit</a>
                                    <form action="{{route('courses.destroy',$data->id)}}" method="post" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    {{-- <a href="{{route('courses.destroy',$data->id)}}" class="btn btn-danger">Delete</a> --}}
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