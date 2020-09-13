@extends('layouts.admin_master')

@section('head')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('adminlte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
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
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Role</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Rooms</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                <tr>
                  <td>#</td>
                  <td><img src="#" alt="photo"></td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->role}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->number}}</td>
                  <td>22/30</td>
                  <td>
                    <a href="{{url('admin/'.$category.'/show',$user->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                @empty

                @endforelse
                </tbody>
                @if($users->count() > 5)
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Rooms</th>
                  <th>Action</th>
                </tr>
                </tfoot>
                @endif
              </table>
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
<!-- jQuery -->
<script src="{{url('adminlte3/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{url('adminlte3/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{url('adminlte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('adminlte3/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('adminlte3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script>
  $(document).ready(function(){
    $(function(){
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
  });
</script>
@endsection
@endsection


