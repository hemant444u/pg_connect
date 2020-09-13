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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">Country
              <a href="{{route('country.create')}}" class="btn btn-sm btn-primary float-sm-right">Add New</a>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Code</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($countries as $country)
                <tr>
                  <td>#</td>
                  <td>{{$country->name}}</td>
                  <td>{{$country->code}}</td>
                  <td>
                    <a href="{{route('country.edit',$country->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="#" class="btn btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{$country->id}}').submit();"><i class="fa fa-trash"></i></a>

                    <form id="delete-form-{{$country->id}}" action="{{ route('country.destroy', $country->id) }}" method="POST" style="display:none;">
                      @method('DELETE')
                      @csrf
                  </form>
                  </td>
                </tr>
                @empty

                @endforelse
                </tbody>
                @if($countries->count() > 5)
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Code</th>
\                  <th>Action</th>
                </tr>
                </tfoot>
                @endif
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>


  </div>

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