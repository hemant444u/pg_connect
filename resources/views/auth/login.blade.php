@extends('layouts.ecommerce_master')

{{-- @section('content')

    <div class="container login">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="title">
                    <center><h3>User Login</h3></center>
                </div>
                <div class="card">
                    <div class="card-body">
                        @if(Session::has('message'))
                        <center class="text-danger">{{Session::get('message')}}</center>
                        @endif
                        <form action="{{url('admin/login')}}" method="post">
                          {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <center>
                                    <button class="btn btn-primary btn-block">Login</button>
                                </center>
                            </div>
                            
                        </form>
                        <center><a href="#">Forgot Password ?</a></center>
                    </div>
                </div>
                <br>
                <a href="{{url('/register')}}">New User - Register Here</a>
                <a href="{{url('/')}}" class="pull-right">Back To Home</a>
            </div>
 
        </div>
        <br>
    </div>
<style>
    .login{padding-top:30px;padding-bottom:30px;}
    .title{padding-top:20px;padding-bottom:20px;}
    .form-group{padding-top:20px;}
    .form-control{margin-top:20px;}    
</style>

@endsection --}}

{{-- @section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Login / register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span>Login or register to start your session.</h6>
                </div>
            </div>
            <div class="checkout__form">
                <div class="row">
                    <div class="col-lg-8">
                    <form action="{{route('register')}}" method="post">
                        @csrf
                        <h5>New User Registeration</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>First Name <span>*</span></p>
                                    <input type="text" name="first-name" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Last Name <span>*</span></p>
                                    <input type="text" name="last-name" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input type="text" name="phone" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Password <span>*</span></p>
                                    <input type="password" name="password" class="@error('password') is-invalid @enderror" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Confirm password <span>*</span></p>
                                    <input type="password" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 offset-md-3 offset-lg-3">
                                <button type="submit" class="btn btn-success btn-block">Register Here</button>
                            </div>
                        
                        </div>
                    </form>
                    </div>
                    <div class="col-lg-4">
                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <div class="checkout__order">
                                <h5>Already have an account ?</h5>
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="email" name="email" class="@error('email') is-invalid @enderror" placeholder="Email or phone" style="border-radius:24px;" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="checkout__form__input">
                                    <p>Password <span>*</span></p>
                                    <input type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="password" style="border-radius:24px;" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <br>
                                
                                <button type="submit" class="site-btn">Login</button>
                                <br><br>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

@endsection --}}

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Login / register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span>Login or register to start your session.</h6>
                </div>
            </div>
            <div class="checkout__form">
                <div class="row">
                    <div class="col-lg-8">
                    <form action="{{route('register')}}" method="post">
                        @csrf
                        <h5>New User Registeration</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Name <span>*</span></p>
                                    <input type="text" name="name" class="@error('name') is-invalid @enderror" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>I am <span>*</span></p>
                                    <select name="role" class="form-control @error('role') is-invalid @enderror">
                                        <option value="user">User</option>
                                        <option value="broker">Broker</option>
                                        <option value="owner">Owner</option>
                                    </select>
                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" required>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Password <span>*</span></p>
                                    <input type="password" name="password" class="@error('password') is-invalid @enderror" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Confirm password <span>*</span></p>
                                    <input type="password" name="password_confirmation" class="@error('password_confirmation') is-invalid @enderror" required>
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6" style="padding:5px;">
                                <i class="fa fa-thumbs-up"></i>
                                I accept all <a href="#">Terms</a> and <a href="#">conditions</a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <button type="submit" class="btn btn-block btn-primary">Register Here</button>
                            </div>
                        
                        </div>
                    </form>
                    </div>
                    <div class="col-lg-4">
                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <div class="checkout__order">
                                <h5>Already have an account ?</h5>
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="email" name="email" class="@error('email') is-invalid @enderror" placeholder="Email or phone" style="border-radius:24px;" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="checkout__form__input">
                                    <p>Password <span>*</span></p>
                                    <input type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="password" style="border-radius:24px;" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <br>
                                <button type="submit" class="site-btn btn">Login</button>
                                <br><br>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <style>
        .checkout__form .checkout__form__input select {
    height: 50px;
    width: 100%;
    border: 1px solid #e1e1e1;
    border-radius: 2px;
    margin-bottom: 25px;
    font-size: 14px;
    padding-left: 20px;
    color: #666666;
}
    </style>

@endsection


