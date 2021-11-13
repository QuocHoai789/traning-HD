<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Đăng nhập user</title>
</head>
<style>
    .m-t-30{
        margin-top: 30px;
    }
</style>
<body>
    <div class="row m-t-30">
        <div class="col-6 mx-auto card">
            <h5 class="card-header text-center">Login User</h5>
            <form method="POST" action="{{ route('post_login') }}">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control @error('Email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="Email">
                  
                </div>
                @error('Email')
                  
                    <div class="alert alert-danger">{{ $message }}</div>
                  
                  @enderror
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control @error('Password') is-invalid @enderror" id="exampleInputPassword1" name="Password">
                </div>
                @error('Password')
                 
                    <div class="alert alert-danger">{{ $message }}</div>
                 
                  @enderror
                
                <button type="submit" class=" btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
    
</body>
</html>