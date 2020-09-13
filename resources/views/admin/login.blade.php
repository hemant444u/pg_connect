<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin | Login</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{url('adminlte3/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('adminlte3/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="">
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="title">
                    <center><h1>Admin Login</</center>
                </div>
                <div class="card">
                    <div class="card-body">
                        @if(Session::has('message'))
                        <center class="text-danger">{{Session::get('message')}}</center>
                        @endif
                        <form action="{{url('admin/login')}}" method="post">
                          {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <center>
                                    <button class="btn btn-primary btn-block">Login</button>
                                </center>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

<style>
    body{background-color:#2d3c4a;}
    .title{padding-top:100px;padding-bottom:20px;}
    .title h1{color:#fff;}
    .form-group{padding-top:20px;}
    .form-control{margin-top:20px;}
    
</style>


<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{url('adminlte3/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('adminlte3/dist/js/adminlte.min.js')}}"></script>
</body>

</html>
