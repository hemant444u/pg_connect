@extends('layouts.ecommerce_master')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <a href="#">Map </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div id="map" style="height:500px;"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

@section('script')
      <script>
    function initMap(){
      var lat = 23.344315;
      var lng = 85.296013;

      var options = {
        zoom:8,
        center:{lat:lat,lng:lng}
      }

      // New map
      var map = new google.maps.Map(document.getElementById('map'), options);

        var markers = [
            @forelse($buildings as $building)
            {
            coords:{lat:{{$building->address->lat ? $building->address->lat : 0}},lng:{{$building->address->lng ? $building->address->lng : 0}}},

            content:'<h6><a href="{{url('pg-details',$building->id)}}">{{$building->name}}</a></h6><hr><p>State: {{$building->address->states ? $building->address->states->name : ""}}</p><p>District:{{$building->address->districts ? $building->address->districts->name : ""}}</p><p>City:{{$building->address->city}}</p><p>Area:{{$building->address->area}}</p>'
            },
            @empty
            @endforelse
            {
                coords:{lat:0,lng:0}
            }
        ];

        for(var i = 0;i < markers.length;i++){
        // Add marker
        addMarker(markers[i]);
      }

      // Add Marker Function
      function addMarker(props){
        var marker = new google.maps.Marker({
          position:props.coords,
          map:map,
          //icon:props.iconImage
        });
        if(props.iconImage){
          // Set icon image
          marker.setIcon(props.iconImage);
        }

        // Check content
        if(props.content){
          var infoWindow = new google.maps.InfoWindow({
            content:props.content
          });

          marker.addListener('click', function(){
            infoWindow.open(map, marker);
          });
        }
      }



    }
  </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2Zz2EofU165j4EdzGkK2klri-napBfIY&callback=initMap">
    </script>
@endsection

@endsection