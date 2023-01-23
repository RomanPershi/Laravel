@extends('layouts.main')
@section('foothead')

    <?php include(app_path() . '/php/forOrder.php') ?>
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
    <link rel="stylesheet" href="{{asset('css/order.css')}}">
    <div class="main_shop">
        <div style="margin-left: 2%" id="order" class="order_block">
            <div class="address_block">
                <div class="buttons_block">
                    <button id="pickup" style="color: #fff;" onclick="Pickup(this)" class="choice_cart">Pickup</button>
                    <button id="delivery" onclick="Delivery(this)" class="choice_cart">Delivery</button>
                </div>
                <div class="address"></div>
                <div class="inputs">
                    <label style="font-size:18px;"
                           class="form-label">House number</label>
                    <input id="House number" class="form-control" name="house_number" autofocus>
                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                    <label style="font-size:18px;" class="form-label">Apartment Number</label>
                    <input id="Apartment Number" class="form-control" name="apartment_number">
                </div>
                <label style="font-size:18px;" class="form-label">Delivery Date</label>
                <input type="date" id="start" class="calendar" name="delivery_date"
                       value={{date('Y-m-d H:i:s')}}
                       min={{date('Y-m-d H:i:s')}} max={{date("Y-m-d",strtotime("+2 months"))}} >
                <div id="alert_pickup">Order must be picked up at the store</div>
                <div class="map_block"></div>
                <div class="order_button">
                    <button onclick="createOrder()" name="withfilter" value="1" type="submit"
                            class="create_order">Confirm Order
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>
    <script src="{{asset("js/cart/map.js")}}"></script>
@endsection
