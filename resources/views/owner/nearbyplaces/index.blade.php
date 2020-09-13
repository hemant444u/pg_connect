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
              <li class="breadcrumb-item active">create</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
        @forelse($buildings as $building)
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">{{$building->name}}
              <a href="{{route('nearbyplaces.create')}}" class="btn btn-sm btn-primary float-sm-right">Add new</a>
            </div> 
            <div class="card-body">
              <div class="row"> 
                @forelse($building->nearbyplaces as $nearby)
                  <div class="col-3">
                    <div class="card">
                      <div class="card-body">
                        <img src="{{$nearby->photo}}" alt="photo" width="204">
                        <div class="pt-2">
                          <small>{{$nearby->place}}: {{$nearby->name}}</small>
                        </div>
                        <small>Distance: {{$nearby->distance}} Km</small>
                        <div class="float-sm-right">
                          <a href="{{route('nearbyplaces.edit',$nearby->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                          <a href="#" class="btn btn-xs btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{$nearby->id}}').submit();"><i class="fa fa-trash"></i></a>

                          <form id="delete-form-{{$nearby->id}}" action="{{ route('nearbyplaces.destroy', $nearby->id) }}" method="POST" style="display:none;">
                            @method('DELETE')
                            @csrf
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                @empty
                @endforelse
              </div>
            </div>
          </div>
        </div>
        @empty

        @endforelse
      </div>
    </section>
  </div>
@endsection