@extends('layouts.admin')
@section('content')
    <?php include(app_path() . '/php/admin_lib.php') ?>
    <div id="title_element">
        @include('admin/includes/title')
    </div>
    @if($define == 'Product')
        @include('admin/includes/create/product')
    @elseif($define == 'User')
        @include('admin/includes/create/user')
    @elseif($define == 'Order')

    @else
        @include('admin/includes/create/onlytitle')
    @endif
    <div id="lay_block" class="product_block">
        @if($define == 'Product')
            @include('admin/includes/product')
        @elseif($define == 'User')
            @include('admin/includes/user')
        @elseif($define == 'Order')
            @include('admin/includes/order')
        @else
            @include('admin/includes/onlytitle')
        @endif
    </div>
@endsection
