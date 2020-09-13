@extends('layouts.ecommerce_master')

@section('content')

<div id="mychannel" class="g-ytsubscribe" data-channelid="UCP3AIk974-PeB9bg1Mc7wug" data-layout="full" data-count="default" data-onytevent="myEvent"></div>

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="categories__item categories__large__item set-bg"
                    data-setbg="{{url($best->banner)}}">
                        <div class="categories__text">
                            <h1>{{$best->name}}</h1>
                            <p>{{$best->rooms->count()}} rooms - <b> For:{{$best->for}}</b></p>
                            <a href="#">Book now</a>
                        </div>
                    </div>
                </div>
            <div class="col-lg-6">
                <div class="row">
                    @forelse($buildings as $building)
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="{{url($building->banner)}}">
                            <div class="categories__text">
                                <h4>{{$building->name}}<b>{{$building->type}}</b></h4>
                                <p>{{$building->rooms->count()}} rooms - <b> For:{{$building->for}}</b></p>
                                <a href="{{url('pg-details',$building->id)}}">Book now</a>
                            </div>
                        </div>
                    </div>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>New Rooms</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">All</li>
                    <li data-filter=".girls">Girl's</li>
                    <li data-filter=".boys">Boy's</li>
                    <li data-filter=".family">Family</li>
                    <li data-filter=".common">Common</li>
                </ul>
            </div>
        </div>
        <div class="row property__gallery">
            <?php $i = 0; ?>
            @forelse($rooms as $room)
            <?php $i++; ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mix {{$room->building->for}}">
                @if($room->building->for == 'boys')
                <?php $class='new'; $label = 'Boys'; ?>
                @elseif($room->building->for == 'girls')
                <?php $class = 'sale'; $label = 'Girls' ?>
                @elseif($room->building->for == 'family')
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
<!-- Product Section End -->

<!-- Banner Section Begin -->
<section class="banner set-bg" data-setbg="{{url('ashion/img/banner/banner-1.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel">
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>Your comfort is our first priority</span>
                            <h1>See details</h1>
                            <a href="#">Book now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>Your comfort is our first priority</span>
                            <h1>Visit the PG/Hostel</h1>
                            <a href="#">Book now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>Your comfort is our first priority</span>
                            <h1>Confirm Room</h1>
                            <a href="#">Book now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>Your comfort is our first priority</span>
                            <h1>Pay and Use</h1>
                            <a href="#">Book now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Trend Section Begin -->
<section class="trend spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Hot Trend</h4>
                    </div>
                    @forelse($hot_trends as $room)
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="{{url($room->photo)}}" alt="" width="90" height="90">
                        </div>
                        <div class="trend__item__text">
                            <h6><a href="{{url('room-details',$room->id)}}">{{$room->building->name}}</a></h6>
                            <small>Room no: {{$room->room_no}}</small>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ {{$room->max_price}}.0</div>
                        </div>
                    </div>
                    @empty

                    @endforelse
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Best seller</h4>
                    </div>
                    @forelse($best_sellers as $room)
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="{{url($room->photo)}}" alt="" width="90" height="90">
                        </div>
                        <div class="trend__item__text">
                            <h6><a href="{{url('room-details',$room->id)}}">{{$room->building->name}}</a></h6>
                            <small>Room no: {{$room->room_no}}</small>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ {{$room->max_price}}.0</div>
                        </div>
                    </div>
                    @empty

                    @endforelse
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Feature</h4>
                    </div>
                    @forelse($feature as $room)
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="{{url($room->photo)}}" alt="" width="90" height="90">
                        </div>
                        <div class="trend__item__text">
                            <h6><a href="{{url('room-details',$room->id)}}">{{$room->building->name}}</a></h6>
                            <small>Room no: {{$room->room_no}}</small>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ {{$room->max_price}}.0</div>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Trend Section End -->

<!-- Discount Section Begin -->
<section class="discount">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="discount__pic">
                    <img src="{{url('ashion/img/discount.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="discount__text">
                    <div class="discount__text__title">
                        <span>Discount</span>
                        <h2>Summer 2019</h2>
                        <h5><span>Sale</span> 50%</h5>
                    </div>
                    <div class="discount__countdown" id="countdown-time">
                        <div class="countdown__item">
                            <span>22</span>
                            <p>Days</p>
                        </div>
                        <div class="countdown__item">
                            <span>18</span>
                            <p>Hour</p>
                        </div>
                        <div class="countdown__item">
                            <span>46</span>
                            <p>Min</p>
                        </div>
                        <div class="countdown__item">
                            <span>05</span>
                            <p>Sec</p>
                        </div>
                    </div>
                    <a href="#">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Discount Section End -->

<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>Free Enquiry</h6>
                    <p>For all oder over $99</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Money Back Guarantee</h6>
                    <p>If good have Problems</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Online Support 24/7</h6>
                    <p>Dedicated support</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Payment Secure</h6>
                    <p>100% secure payment</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

@section('script')
<script src="https://apis.google.com/js/platform.js"></script>
    <script>
        $(document).ready(function(){
            var subscribed = $('.yt-uix-button').data('is-subscribed');
            alert(subscribed);

        });
    </script>
@endsection

@endsection

