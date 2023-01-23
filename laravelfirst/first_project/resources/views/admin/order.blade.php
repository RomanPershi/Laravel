@extends('layouts.admin')
@section('content')
    <?php include(app_path() . '/php/admin_lib.php') ?>
    <br>
    <input type="hidden" name="lat" value={{$field->lat}}>
    <input type="hidden" name="lng" value={{$field->lng}}>
    <div id="address_block">
        <span id="address">Address:<span class="address"></span></span>
        <div id="house_number">House Number:{{$field->house_number}}</div>
        <div id="apartment_number">Apartment Number:{{$field->apartment_number}}</div>
    </div>
    <div class="map_block"></div>
    <div class="delivery_date">
        <div class="delivery_title">Delivery Date</div>
        {{$field->delivery_date}}
    </div>
    @if($field->status_pay == NULL)
        <div style="margin-top: 40px;">
            <button onclick="changeStatus(this)" name="{{$field->id}}" value="1" class="btn btn-success">Confirm order
            </button>
            <button onclick="changeStatus(this)" style="margin-left: 10px;" name="{{$field->id}}" value="2"
                    class="btn btn-danger">Denied order
            </button>
        </div>
    @else
        <div>Status Pay:
            <span
                class="{{getStatus($field->status_pay,'success_status','danger_status')}}">{{getStatus($field->status_pay,'Confirmed','Denied')}}</span>
        </div>
    @endif
    @csrf
    <div class="page_product">
        @foreach($field->product as $part_table)
            <div class="product_form">
                <div class="product_photo">
                    <img class="img_block" src="{{asset('products/img/'.$part_table->title.'.png')}}" alt="">
                </div>
                <div class="product_info">
                        <?php $type_connect = $part_table->type_connect == 0 ? 'wired' : 'Unwired' ?>
                    <a class="form_link"
                       href="{{route('admin.product',$part_table->id)}}">
                        <div class="link_field">
                            Keyboard {{$type_connect.' '.$part_table->Manufacturer->title.' '.$part_table->title}}
                            [{{$part_table->TypeKeyboard->title.', keys - '.$part_table->keys.', '.$part_table->InterfaceConnect->title.' ,'.$part_table->KeyboardColor->title}}
                            ]
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>
    <script src="{{asset("js/cart/map.js")}}"></script>
    <script src="{{asset("js/admin/map.js")}}"></script>
@endsection
