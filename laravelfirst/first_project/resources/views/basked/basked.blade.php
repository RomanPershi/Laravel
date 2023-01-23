@extends('layouts.main')
@section('foothead')
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
    <div class="main_shop">
        <div style="margin-left: 2%" id="product" class="product_block">
            @include('order.product')
        </div>
        @if ($cookie != NULL)
            @include('order.price')
        @endif
    </div>
@endsection
