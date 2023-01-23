@extends('layouts.main')
@section('foothead')
    <link rel="stylesheet" href="{{asset('css/home_slide.css')}}">
    <div class="main_welcome">
        <div class="lay1">
            <div class="container">
                <div class="slider_block">
                    <div class="container_slider_css">
                        <img class='photo_slider_css'  src="{{asset('img/keyboard2.jpg')}}" alt="" />
                        <img class='photo_slider_css'  src="{{asset('img/keyboard3.jpg')}}" alt="" />
                        <img class='photo_slider_css'  src="{{asset('img/keyboard4.jpg')}}" alt="" />
                        <img class='photo_slider_css'  src="{{asset('img/keyboard1.jpg')}}" alt="" />
                    </div>
                </div>
            </div>
            <a href="{{route('shop')}}" class="ghost-button">Go to Shop</a>
        </div>
@endsection
