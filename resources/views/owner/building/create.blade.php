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
              <li class="breadcrumb-item"><a href="#">PG/Hostel</a></li>
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
              <span>Add new PG/Hostel</span>
              <span><a href="{{route('building.index')}}" class="btn btn-sm btn-primary float-sm-right">Back</a></span>
            </div>
            <div class="card-body">
              <form action="{{route('building.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="name" required>
                  </div>
                  <div class="col-md-6">
                    <label for="type">Type</label>
                    <select name="type" class="form-control" required>
                      <option value="PG">PG</option>
                      <option value="Hostel">Hostel</option>
                    </select>
                  </div>
                </div>

                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="slug">For</label>
                    <select name="for" class="form-control">
                      <option value="girls">Girls</option>
                      <option value="boys">Boys</option>
                      <option value="family">Family</option>
                      <option value="common">Common</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="slug">Banner</label>
                    <input type="file" class="form-control" name="banner" accept="image/*" required>
                  </div>
                </div>

                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <input type="reset" class="btn btn-warning btn-block" value="Reset">
                  </div>
                  <div class="col-md-6">
                    <input type="submit" class="btn btn-primary btn-block" value="Add PG/Hostel">
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


