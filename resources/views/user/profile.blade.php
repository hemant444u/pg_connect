@extends('layouts.ecommerce_master')

@section('content')
<?php $user = Auth::User(); ?>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Profile</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="profile-head" style="padding-top:50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card" style="background-color:darkorange;">
                        <div class="card-body">
                            <a href="{{url('shoping-cart')}}">
                            <h3 class="text-center">{{session('cart') ? count(session('cart')) : 0}}</h3>
                            <h4 class="text-center"><span class="icon_bag_alt"></span> Cart</h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="background-color:green;">
                        <div class="card-body">
                            <a href="{{url('shoping-cart')}}">
                            <h3 class="text-center">{{session('wishlist') ? count(session('wishlist')) : 0}}</h3>
                            <h4 class="text-center"><span class="icon_heart_alt"></span> Wishlist</h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="background-color:blue;">
                        <div class="card-body">
                            <a href="{{url('shoping-cart')}}">
                            <h3 class="text-center">73</h3>
                            <h4 class="text-center"><span class="fa fa-balance-scale"></span> Inquiry</h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="background-color:yellow;">
                        <div class="card-body">
                            <a href="{{url('shoping-cart')}}">
                            <h3 class="text-center">5</h3>
                            <h4 class="text-center"><span class="fa fa-cubes"></span> Booking</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="profile" style="padding-top:50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card" style="margin-bottom: 20px;">
                        <div class="card-header">Inquiry history</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Hostel/Pg</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Place</th>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card" style="margin-bottom: 20px;">
                        <div class="card-body">
                            <form action="{{url('update-profile')}}" method="post" class="checkout__form">
                        @csrf
                        <h5>Basic details</h5>
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="checkout__form__input">
                                    <p>Name <span>*</span></p>
                                    <input type="text" name="name" value="{{$user->name}}" required>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input type="text" name="number" value="{{$user->number}}" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="email" name="email" value="{{$user->email}}" required>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button type="submit" class="site-btn btn-block">Update profile</button>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12" style="padding-top:20px;">
                                <a href="#" class="">Forgot Password ?</a>
                                <a href="#" class="pull-right" onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</a>
                            </div>
                        
                        </div>
                    </form>
                            <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection