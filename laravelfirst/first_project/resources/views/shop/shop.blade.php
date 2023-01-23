@extends('layouts.main')
@section('foothead')
    <div class="main_shop">
        <div id="lay_block" class="product_block">
            @include('shop.includes.product')
        </div>
        @include('shop/slider')
    </div>
@endsection
