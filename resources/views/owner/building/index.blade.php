@extends('layouts.owner_master')

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
            <a href="{{route('building.create')}}" class="btn btn-primary btn-sm">Add New</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pg/Hostel</li>
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
                  <th>Type</th>
                  <th>For</th>
                  <th>Rooms</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 0?>
                @forelse($buildings as $building)
                <?php $i++ ?>
                <tr>
                  <td>{{$i}}</td>
                  <td><img src="{{url($building->banner)}}" alt="photo" width="50" height="50"></td>
                  <td>{{$building->name}}</td>
                  <td>{{$building->type}}</td>
                  <td>{{$building->for}}</td>
                  <td>{{$building->rooms->count()}}</td>
                  <td>
                    <a href="{{route('building.edit',$building->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="#" class="btn btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{$building->id}}').submit();"><i class="fa fa-trash"></i></a>

                    <form id="delete-form-{{$building->id}}" action="{{ route('building.destroy', $building->id) }}" method="POST" style="display:none;">
                      @method('DELETE')
                      @csrf
                  </form>
                  </td>
                </tr>
                @empty

                @endforelse
                </tbody>
                @if($buildings->count() > 5)
                <tfoot>
                <tr>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>For</th>
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


