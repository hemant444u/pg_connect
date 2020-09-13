@extends('layouts.ecommerce_master')
@section('head')
    <link rel="stylesheet" href="{{url('/bxslider-4-4.2.12/dist/jquery.bxslider.css')}}">
    <script src="{{url('/bxslider-4-4.2.12/dist/jquery.bxslider.min.js')}}"></script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">

    </div>
</div>

    <section>
        <div class="front">
            
        </div>
    </section>
    
    <section>
        
    </section>

    <section>
        <ul class="bxslider">
            {{--     <li><img src="{{URL::to('cyam.jpg')}}" alt="" style="width:100%; height:auto; max-height: 580px;"></li>
            @forelse($sliders as $slider)
                <li>
                    @if($slider->type == 'image')
                        <img src="{{URL::to($slider->name)}}" alt="" style="width:100%; height:auto; max-height: 580px;">
                    @endif

                    @if($slider->type == 'video')
                        <video src="{{URL::to($slider->name)}}" type="video/*" poster="" style="width:100%; height:auto; max-height: 580px; padding-bottom: 36px;" controls></video>
                    @endif

                    @if($slider->type == 'audio')
                        <audio src="{{URL::to('/sliders/'.$slider->name)}}" type="video/*" poster="" style="width:100%; height:auto; max-height: 120px;" controls></audio>
                    @endif  
                </li>
            @empty
                <li><img src="{{URL::to('cyam.jpg')}}" alt="" style="width:100%; height:auto; max-height: 580px;"></li>
            @endforelse --}}
            <li><img src="{{url('images/logo/pgconnect.png')}}" alt="" style="width:100%; height:auto; max-height: 580px;"></li>
            <video src="{{url('videoes/test.mp4')}}" type="video/*" poster="" style="width:100%; height:auto; max-height: 580px; padding-bottom: 36px;" controls></video>
            
            <li><img src="{{url('images/logo/pgconnect.png')}}" alt="" style="width:100%; height:auto; max-height: 580px;"></li>
        </ul>
    </section>

<style>
    .front{background-image: url("https://images.unsplash.com/photo-1587202135147-b82e6e3022b0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80");background-size:cover;background-repeat:no-repeat;
    background-attachment:fixed;height:580px;}
</style>
<script>
    $(document).ready(function() {

        $('.bxslider').bxSlider({
          auto: true,
          pager: true,
        });
    });
</script>
@endsection
