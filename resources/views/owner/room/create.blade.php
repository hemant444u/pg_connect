@extends('layouts.owner_master')

@section('head')

@endsection
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Building</a></li>
              <li class="breadcrumb-item active">create</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <span>Add new room</span>
              <span><a href="{{route('room.index')}}" class="btn btn-sm btn-primary float-sm-right">Back</a></span>
            </div>
            <div class="card-body">
              <form action="{{route('room.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="type">Building</label>
                    <select name="building" class="form-control" required>
                      @forelse($buildings as $building)
                      <option value="{{$building->id}}">{{$building->name}}</option>
                      @empty

                      @endforelse
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="Name">Room No</label>
                    <input type="number" class="form-control" name="room_no" required>
                  </div>
                </div>

                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="Name">Total Beds</label>
                    <input type="number" class="form-control" name="bed" required placeholder="count of beds in this room">
                  </div>
                  <div class="col-md-6">
                    <label for="Name">Total Renter can live</label>
                    <input type="number" class="form-control" name="renter" required placeholder="count of renters can live in this room">
                  </div>
                </div>

                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="slug">Available beds</label>
                    <input type="number" name="available" placeholder="count of Available beds" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    <label for="max_rent">Max rent</label>
                    <input type="number" class="form-control" name="max_rent" required>
                  </div>
                </div>
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="slug">Photo</label>
                    <input type="file" class="form-control" name="banner" accept="image/*" required>
                  </div>
                  <div class="col-md-6">
                    <label for="slug">Video</label>
                    <input type="file" class="form-control" name="video" accept="video/*">
                  </div>
                </div>

                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <input type="reset" class="btn btn-warning btn-block" value="Reset">
                  </div>
                  <div class="col-md-6">
                    <input type="submit" class="btn btn-primary btn-block" value="Add Room">
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection


