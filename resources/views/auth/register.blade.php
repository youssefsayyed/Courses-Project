<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
</head>
<body>

    <div class="container d-flex justify-content-center align-items-start vh-100">
        
        
        <div class="card col-8 mt-md-5" style="transform: translateY(50%);">
            <div class="card-header theme-info">
                <h3 class="card-title text-center" style="float: none;">Please Enter Your Info</h3>
            </div>
            <form role="form" method="POST" action="{{ route('register') }}">
            @csrf
                <div class="card-body">
                    <div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control" name="name"  placeholder="Enter Your name" value="{{old('name')}}">
                    @error('name')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label >Email</label>
                    <input type="text" class="form-control" name="email"  placeholder="Enter Email" value="{{old('email')}}">
                    @error('email')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label >Password</label>
                    <input type="password" class="form-control" name="password"  placeholder="Enter Password">
                    @error('password')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Password Confirmation</label>
                    <input type="password" class="form-control" name="password_confirmation"  placeholder="Enter Password">
                    @error('password_confirmation')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn-solid theme-info mr-3">Register</button>
                </div>
            </form>

        </div>

    </div>

     

   

   
    

    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
</body>
</html>
