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
              <li class="breadcrumb-item"><a href="#">Nearbyplaces</a></li>
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
              <span>Edit nearby places</span>
              <span><a href="{{route('building.index')}}" class="btn btn-sm btn-primary float-sm-right">Back</a></span>
            </div>
            <div class="card-body">
              <form action="{{route('nearbyplaces.update',$nearbyplaces->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="type">Building</label>
                    <select name="building" class="form-control" required>
                      @forelse($buildings as $building)
                      <option value="{{$building->id}}" {{$building->id == $nearbyplaces->building_id ? 'selected' : ''}}>{{$building->name}}</option>
                      @empty
                      @endforelse
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="place">Place</label>
                    <select name="place" class="form-control">
                      <option value="Company" {{$nearbyplaces->place == 'Company' ? 'selected' : ''}}>Company</option>
                      <option value="Hotel" {{$nearbyplaces->place == 'Hotel' ? 'selected' : ''}}>Hotel</option>
                      <option value="Temple" {{$nearbyplaces->place == 'Temple' ? 'selected' : ''}}>Temple</option>
                    </select>                  
                  </div>
                </div>

                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$nearbyplaces->name}}" required>
                  </div>
                  <div class="col-md-6">
                    <label for="distance">Distance from building</label>
                    <div class="input-group">
                    <input type="text" class="form-control" name="distance" value="{{$nearbyplaces->distance}}" required>
                      <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">Km</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="photo">Photo</label>
                    <img src="{{url($nearbyplaces->photo)}}" alt="photo" width="100" height="100">
                    <input type="file" class="form-control" name="photo" accept="image/*">
                  </div>
                  <div class="col-md-6">
                    <label for="video">Video</label>
                    <video src="{{url($nearbyplaces->video)}}" type="video/*" width="100" height="100" autoplay controls></video>
                    <input type="file" class="form-control" name="video" accept="video/*">
                  </div>
                </div>

                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <input type="reset" class="btn btn-warning btn-block" value="Reset">
                  </div>
                  <div class="col-md-6">
                    <input type="submit" class="btn btn-primary btn-block" value="Save">
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


