@extends('layouts.admin_master')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{$user->photo ? $user->photo : 'https://cdn1.vectorstock.com/i/1000x1000/31/95/user-sign-icon-person-symbol-human-avatar-vector-12693195.jpg'}}"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{$user->name}}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Role:</b><a class="float-right">{{$user->role}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email:</b> <a class="float-right">{{$user->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Mobile:</b> <a class="float-right">{{$user->number}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Joined:</b> <a class="float-right">{{$user->created_at->format('d-m-Y')}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Status:</b> <a class="float-right">{{$user->status}}</a>
                  </li>
                </ul>
                @if($user->status == 'active')
                <a href="#" class="btn btn-danger btn-block"><b>Block</b></a>
                @else
                <a href="#" class="btn btn-primary btn-block"><b>Active</b></a>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  @if($user->role == 'user')
                    <li class="nav-item"><a class="nav-link active" href="#wishlist" data-toggle="tab">In wishlist</a></li>
                    <li class="nav-item"><a class="nav-link" href="#cart" data-toggle="tab"></a>In cart</li>
                    <li class="nav-item"><a class="nav-link" href="#bookedrooms" data-toggle="tab">Booked rooms</a></li>
                  @else
                    <li class="nav-item"><a class="nav-link active" href="#hostel" data-toggle="tab">PG/Hostel</a></li>
                    <li class="nav-item"><a class="nav-link" href="#empty" data-toggle="tab">Empty rooms</a></li>
                    <li class="nav-item"><a class="nav-link" href="#booked" data-toggle="tab">Booked rooms</a></li>
                  @endif
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  @if($user->role == 'user')
                  <div class="active tab-pane" id="wishlist">
                    In wishlist
                  </div>

                  <div class="tab-pane" id="card">
                    IN cart
                  </div>

                  <div class="tab-pane" id="bookedrooms">
                    Show Booked rooms
                  </div>
                  @else
                  <div class="active tab-pane" id="hostel">
                    show hostel details
                  </div>

                  <div class="tab-pane" id="empty">
                    Empty rooms
                  </div>

                  <div class="tab-pane" id="booked">
                    Booked rooms
                  </div>
                  @endif
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection