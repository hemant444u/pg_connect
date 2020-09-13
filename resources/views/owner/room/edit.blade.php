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
              <li class="breadcrumb-item"><a href="#">Room availabelity</a></li>
              <li class="breadcrumb-item active">edit</li>
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
              <span>Edit room</span>
              <span><a href="{{route('room.index')}}" class="btn btn-sm btn-primary float-sm-right">Back</a></span>
            </div>
            <div class="card-body">
              <form action="{{route('room.update',$room->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="type">Building</label>
                    <select name="building" class="form-control" required>
                      @forelse($buildings as $building)
                      <option value="{{$building->id}}" {{$building->id == $room->building->id ? 'selected' : ''}}>{{$building->name}}</option>
                      @empty

                      @endforelse
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="Name">Room No</label>
                    <input type="number" class="form-control" name="room_no" value="{{$room->room_no}}" required>
                  </div>
                </div>

                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="Name">Toal Bed</label>
                    <input type="number" class="form-control" name="bed" value="{{$room->bed}}" required placeholder="count bed in this room">
                  </div>
                  <div class="col-md-6">
                    <label for="Name">Total Renter can live</label>
                    <input type="number" class="form-control" name="renter" value="{{$room->renter}}" required placeholder="count of renters can live in this room">
                  </div>
                </div>

                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="slug">Available beds</label>
                    <input type="number" name="available" value="{{$room->available}}" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    <label for="slug">Max rent</label>
                    <input type="number" class="form-control" name="max_rent" value="{{$room->max_rent}}" required>
                  </div>
                </div>
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="slug">Room photo</label>
                    <img src="{{url($room->photo)}}" alt="photo" height="100" width="100">
                    <input type="file" class="form-control" name="banner" accept="image/*">
                  </div>
                  <div class="col-md-6">
                    <label for="video">Video</label>
                    <video src="{{url($room->video ? $room->video : '')}}" type="video/*" width="85" height="85" autoplay controls></video>
                    <input type="file" name="video" accept="video/*" class="form-control">
                  </div>
                </div>

                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <input type="reset" class="btn btn-warning btn-block" value="Reset">
                  </div>
                  <div class="col-md-6">
                    <input type="submit" class="btn btn-primary btn-block" value="Update room">
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

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">Photo Gallery</div>
            <div class="card-body">
              <div class="row"> 
              @forelse($room->galleries as $gallery)
              <div class="col-md-2" style="padding:5px;border:2px solid #ddd;">
                <img src="{{$gallery->image}}" width="160" height="160">
              </div>
              @empty
              @endforelse
              </div>
              <hr>
              <div class="row">
                <form action="{{url('owner/room/gallery')}}" method="post" enctype="multipart/form-data" class="float-sm-right">
                  @csrf
                  <div class="form-group">
                    <input type="file" name="photo" accept="image/*" class="form-control">
                  </div>
                  <input type="hidden" name="room_id" value="{{$room->id}}">
                  <input type="submit" value="Upload" class="btn btn-sm btn-primary">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
  <!-- /.content-wrapper -->


@endsection


