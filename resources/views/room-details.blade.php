@extends('layouts.ecommerce_master')

@section('content')
<?php $building = $room->building ?>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <a href="#">{{$building->for}} </a>
                        <span>{{$building->name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            <a class="pt active" href="#product-{{$room->id}}">
                                <img src="{{url($room->photo)}}" alt="">
                            </a>
                            @if($room->video)
                            <a class="pt" href="#video-{{$room->id}}">
                            <video src="{{url($room->video ? $room->video : '')}}" type="video/*" width="120" height="120" autoplay controls></video>
                            </a>
                            @endif

                            @forelse($room->galleries as $image)
                            <a class="pt active" href="#image-{{$image->id}}">
                                <img src="{{url($image->image)}}" alt="photo">
                            </a>
                            @empty

                            @endforelse

                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="product-{{$room->id}}" class="product__big__img" src="{{url($room->photo)}}" alt="">
                                @if($room->video)
                                <video data-hash="video-{{$room->id}}" src="{{url($room->video ? $room->video : '')}}" type="video/*" width="400" height="400" autoplay controls></video>
                                @endif
                                @forelse($room->galleries as $image)
                                <img data-hash="image-{{$image->id}}" class="product__big__img" src="{{$image->image}}" alt="photo">
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{$building->name}} <span>For: {{$building->for}}</span></h3>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>( 138 reviews )</span>
                        </div>
                        <div class="product__details__price"><small>Max rent: </small>$ {{$room->max_rent}}.00 </div>
                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Member want to visit:</span>
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                            <a href="#" class="cart-btn" data-id="{{$room->id}}">
                                <span class="icon_bag_alt"></span>Send visit request
                            </a>
                        </div>
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Room no:</span>
                                    <p>{{$room->room_no}}</p>
                                </li>
                                <li>
                                    <span>Total bed:</span>
                                    <p>{{$room->bed}}</p>
                                </li>
                                <li>
                                    <span>Available beds:</span>
                                    <p>{{$room->available}}</p>
                                </li>
                                <li>
                                    <span>Renter can live:</span>
                                    <p>{{$room->renter}}</p>
                                </li>
                                <li>
                                    <span>Max rent:</span>
                                    <p>${{$room->max_rent}}.00 per month</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Show on map</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ( 2 )</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="tabs-1" role="tabpanel">
                                <h6>Description</h6>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                    atem sequi nesciunt. Nulla
                                consequat massa quis enim.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                quis, sem.</p>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div id="map" style="height:500px"></div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <h6>Reviews ( 2 )</h6>
                                <p>Nptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                consequat massa quis enim.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>TOTAL ROOMS IN THIS BUILDING ({{$building->rooms->count()}})</h5>
                    </div>
                </div>
            </div>
            <div class="row property__gallery">
            <?php $i = 0; ?>
            @forelse($building->rooms as $room)
            <?php $i++; ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mix {{$building->for}}">
                @if($building->for == 'boys')
                <?php $class='new'; $label = 'Boys'; ?>
                @elseif($building->for == 'girls')
                <?php $class = 'sale'; $label = 'Girls' ?>
                @elseif($building->for == 'family')
                <?php $class='stockout'; $label = 'Family'; ?>
                @else
                <?php $class='stockout'; $label= 'Common' ?>
                @endif
                <div class="product__item {{$class}}">
                    <div class="product__item__pic set-bg" data-setbg="{{url($room->photo)}}">
                        <div class="label {{$class}}">{{$label}}</div>
                        <ul class="product__hover">
                            <li><a href="{{url($room->photo)}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="#" class="addToWishlist" data-id="{{$room->id}}"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#" class="addToCart" data-id="{{$room->id}}"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{url('room-details',$room->id)}}">{{$room->number}}</a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <a href="{{url('room-details',$room->id)}}">{{$room->building->name}}</a>
                        Room No: <span>{{$room->room_no}}</span>
                        <div class="product__price">Available beds: {{$room->available}}
                            <span>{{$room->bed}}</span>
                        </div>
                        <small>Max rent: $ <span>{{$room->max_rent}}.00 </span> per month</small>
                    </div>
                </div>
            </div>
            @empty

            @endforelse
        </div>
        </div>
    </section>
    <!-- Product Details Section End -->

@section('script')
      <script>
    function initMap(){
      var lat = {{$building->address->lat ? $building->address->lat : 23.344315}};
      var lng = {{$building->address->lng ? $building->address->lng : 85.296013}};

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
            @if($building->id == $room->building->id)
            iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
            @endif
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