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
            Dashboard
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Address</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

        <!-- Main content -->
    <?php $address = Auth::User()->address; ?>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <span>Edit Address</span>
            </div>
            <div class="card-body">
              <form action="{{route('address.update',$address->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="country">Country</label>
                    <select name="country" class="form-control country" required>
                      @forelse($countries as $country)
                      <option value="{{$country->id}}" {{$country->id == $address->country || $country->id == $s_country->id ? 'selected' : ''}}>{{$country->name}}</option>
                      @empty
                      @endforelse
                    </select>             
                  </div>
                  <div class="form-group">
                    <label for="state">State</label>
                    <select name="state" class="form-control state" required>
                      @forelse($s_country->states as $state)
                      <option value="{{$state->id}}" {{$state->id == $address->state ? 'selected' : ''}}>{{$state->name}}</option>
                      @empty
                      @endforelse
                    </select>                  
                  </div>

                  <div class="form-group">
                    <label for="slug">District</label>
                    <select name="district" class="form-control district" required>
                      @forelse($s_state->districts as $district)
                      <option value="{{$district->id}}" {{$district->id == $address->district ? 'selected' : ''}}>{{$district->name}}</option>
                      @empty
                      @endforelse
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="slug">City</label>
                    <input type="text" class="form-control" name="city" value="{{$address->city}}" required>
                  </div>
                  <div class="form-group">
                    <label for="slug">Area</label>
                    <input type="text" name="area" class="form-control" value="{{$address->area}}" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="slug">Landmark</label>
                  <input type="hidden" name="lat" class="form-control" id="lat" value="{{$address->lat}}">
                  <input type="hidden" name="lng" class="form-control" id="lng" value="{{$address->lng}}">
                  <div id="map" style="height: 380px;"></div>
                </div>
              </div>

                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <input type="reset" class="btn btn-warning btn-block" value="Reset">
                  </div>
                  <div class="col-md-6">
                    <input type="submit" class="btn btn-primary btn-block" value="Update Address">
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
  </div>
  @section('script')
  <script>
    function initMap(){
      var lat = {{$address->lat ? $address->lat : 23.344315}};
      var lng = {{$address->lng ? $address->lng : 85.296013}};
      var options = {
        zoom:8,
        center:{lat:lat,lng:lng},
      }

      // New map
      var map = new google.maps.Map(document.getElementById('map'), options);
      // Listen for click on map
      google.maps.event.addListener(map, 'click', function(event){
        // Add marker
        deleteMarkers();
        setlat({coords:event.latLng});
        addMarker({coords:event.latLng});
      });
      var oldmarkers = [
        {
          coords:{lat:lat,lng:lng},
          iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
          content:'<p><a href="#">{{Auth::User()->name}}</a></p><hr><p>State: {{$address->states ? $address->states->name : "N/A"}}</p><p>District:{{$address->districts ? $address->districts->name : "N/A"}}</p><p>City:{{$address->city}}</p><p>Area:{{$address->area}}</p>'

        }
      ];
      defaultMarker(oldmarkers[0]);
      function defaultMarker(props){
        var oldmarker = new google.maps.Marker({
            position:props.coords,
            map:map,
            //icon:props.iconImage
          });

        // Check for customicon
        if(props.iconImage){
          // Set icon image
          oldmarker.setIcon(props.iconImage);
        }

        // Check content
        if(props.content){
          var infoWindow = new google.maps.InfoWindow({
            content:props.content
          });

          oldmarker.addListener('click', function(){
            infoWindow.open(map, oldmarker);
          });
        }
      }
        var markers = [];

      // Add Marker Function
      function addMarker(props){
        var marker = new google.maps.Marker({
          position:props.coords,
          map:map,
          //icon:props.iconImage
        });
        markers.push(marker);
      }
      function deleteMarkers() {
        clearMarkers();
        markers = [];
      }
      function clearMarkers() {
        setMapOnAll(null);
      }
      function setMapOnAll(map) {
        for (let i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
      }
      function setlat(props){
        document.getElementById('lat').value = props.coords.lat();
        document.getElementById('lng').value = props.coords.lng();
      }

    }
  </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2Zz2EofU165j4EdzGkK2klri-napBfIY&callback=initMap">
    </script>

  <script>
    $(document).ready(function(){
      var url = "{{route('address.index')}}";
      var country = '?country={{$s_country
        ->id}}';

      $(document).on('change','.country',function(){
        country = "?country=" + $(this).val();
        window.location.href = url + country;
      });

      $(document).on('change','.state',function(){
        var url = "{{route('address.index')}}";
        var state = country + "&state=" + $(this).val();
        window.location.href = url + state;
      });

    });
  </script>
@endsection

@endsection