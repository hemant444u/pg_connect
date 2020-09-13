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
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">State</li>
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
              <div class="row">
              <div class="col-md-3">
                <form>
                  @csrf
                  <div class="form-group d-flex">
                    <select name="country" class="form-control country">
                      @forelse($countries as $country)
                      <option value="{{$country->id}}" {{$country->id == $s_country->id ? 'selected' : ''}}>{{$country->name}}</option>
                      @empty
                      @endforelse
                    </select>
                  </div>
                </form>
              </div>
              <div class="col-md-9">
                <a href="{{route('state.create')}}" class="btn btn-sm btn-primary float-sm-right">Add State</a>
              </div>
            </div>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Country</th>
                  <th>State</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($states as $state)
                <tr>
                  <td>#</td>
                  <td>{{$state->country->name}}</td>
                  <td>{{$state->name}}</td>
                  <td>
                    <a href="{{route('state.edit',$state->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="#" class="btn btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{$state->id}}').submit();"><i class="fa fa-trash"></i></a>

                    <form id="delete-form-{{$state->id}}" action="{{ route('state.destroy', $state->id) }}" method="POST" style="display:none;">
                      @method('DELETE')
                      @csrf
                  </form>
                  </td>
                </tr>
                @empty

                @endforelse
                </tbody>
                @if($states->count() > 5)
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Country</th>
                  <th>State</th>
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

    $(document).on('change','.country',function(){
      var url = "{{route('state.index')}}";
      var country = "?country=" + $(this).val();
      window.location.href = url + country;
    });
  });
</script>
@endsection
@endsection


