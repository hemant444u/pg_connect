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
              <li class="breadcrumb-item"><a href="#">District</a></li>
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
              <span>Add new district</span>
              <span><a href="{{route('district.index')}}" class="btn btn-sm btn-primary float-sm-right">Back</a></span>
            </div>
            <div class="card-body">
              <form action="{{route('district.update',$district->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="code">Country</label>
                    <select name="country" class="form-control country" required>
                      @forelse($countries as $country)
                        <option value="{{$country->id}}" {{$country->id == $s_country->id ? 'selected' : ''}}>{{$country->name}}</option>
                      @empty
                      @endforelse
                    </select>                  
                  </div>
                  <div class="col-md-6">
                    <label for="Name">State</label>
                    <select name="state" class="form-control state" required>
                      @forelse($s_country->states as $state)
                        <option value="{{$state->id}}" {{$state->id == $district->state->id ? 'selected' : ''}}>{{$state->name}}</option>
                      @empty
                      @endforelse
                    </select>
                  </div>
                </div>
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="code">District Name</label>
                    <input type="text" name="district" class="form-control" value="{{$district->name}}" required>           
                  </div>
                </div>

                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <input type="reset" class="btn btn-warning btn-block" value="Reset">
                  </div>
                  <div class="col-md-6">
                    <input type="submit" class="btn btn-primary btn-block" value="Update District">
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

@section('script')
  <script>
    $(document).ready(function(){
      $(document).on('change','.country',function(){
        var id = $(this).val();
        var url = '{{route('district.edit',$district->id)}}';
        window.location.href = url + '?country=' + $(this).val();
                
      });
    });
  </script>
@endsection
@endsection


