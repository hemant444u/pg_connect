@extends('layouts.admin_master')

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
              <li class="breadcrumb-item"><a href="#">Country</a></li>
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
              <span>Add new Country</span>
              <span><a href="{{route('country.index')}}" class="btn btn-sm btn-primary float-sm-right">Back</a></span>
            </div>
            <div class="card-body">
              <form action="{{route('country.update',$country->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$country->name}}" required>
                  </div>
                  <div class="col-md-6">
                    <label for="code">Code</label>
                    <input type="text" class="form-control" name="code" value="{{$country->code}}" required>
                  </div>
                </div>

                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <input type="reset" class="btn btn-warning btn-block" value="Reset">
                  </div>
                  <div class="col-md-6">
                    <input type="submit" class="btn btn-primary btn-block" value="Update Country">
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


