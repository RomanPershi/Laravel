@extends('layouts.admin')
@section('content')
    <?php include(app_path() . '/php/admin_lib.php') ?>
    <div class="main_title_page">Keyboard {{$field->Manufacturer->title.' '.$field->title}}</div>
    <br>
    <form action="{{route('admin.productUpdate',$field->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="page_product">
            <div class="block_photo">
                <img class="page_img" src="{{asset('products/img/'.$field->title.'.png')}}" alt="">
            </div>
            <img class="product_img" id="blah" src="#" alt=""/>
            <input name="mainfile" class="mt-3" type="file" id="document_attachment_doc"/>
            <div class="characteristics">
                <div class="characteristics_title">Characteristics
                    Keyboard {{$field->Manufacturer->title.' '.$field->title}}</div>
                <div class="characteristics_subtype">
                    <div class="subtype_title">Appearance</div>
                    {{characterListOut('ColorKey',$field,$color_keys,'Color Keys','color_keys_id')}}
                    {{characterListOut('KeyboardColor',$field,$keyboard_color,'Color Keyboard','keyboard_color_id')}}
                </div>
                <div class="characteristics_subtype">
                    <div class="subtype_title">Classification</div>
                    <div class="characteristics_part">
                        <div class="text_part">Keys</div>
                        <input name="keys" class="characteristics_value" value="{{$field->keys}}" type="text">
                    </div>
                    {{characterBoolOut('is_noising',$field,'No','Yes','Silent Keys')}}
                    {{characterListOut('TypeKeyboard',$field,$type_keyboard,'Type Keyboard','type_keyboard_id')}}
                    {{characterListOut('Manufacturer',$field,$manufacturer,'Manufacturer','manufacturer_id')}}
                    {{characterBoolOut('is_gaming',$field,'No','Yes','Is Gaming')}}
                    <div class="characteristics_part">
                        <div class="text_part">Model</div>
                        <input style="display: none;" name="own_title" class="characteristics_value" value="{{$field->title}}" type="text">
                        <input name="title" class="characteristics_value" value="{{$field->title}}" type="text">
                    </div>
                </div>
                <div class="characteristics_subtype">
                    <div class="subtype_title">Functionality</div>
                    {{characterBoolOut('number_block',$field,'No','Yes','Number Block')}}
                </div>
                <div class="characteristics_subtype">
                    <div class="subtype_title">Connection</div>
                    {{characterBoolOut('type_connect',$field,'Unwired','Wired','Type Connect')}}
                    {{characterListOut('InterfaceConnect',$field,$interface_connect,'Interface Connect','interface_connect_id')}}
                </div>
                <div class="characteristics_subtype">
                    <div class="subtype_title">Other Info</div>
                    <div class="characteristics_part">
                        <div class="text_part">Price</div>
                        <input name="price" class="characteristics_value" value="{{$field->price}}" type="text">
                    </div>
                    <div class="characteristics_part">
                        <div class="text_part">Count</div>
                        <input name="count" class="characteristics_value" value="{{$field->count}}" type="text">
                    </div>
                </div>
            </div>
            <button style="margin-top: 10px;" type="submit" class="btn btn-primary" id="upload">Update</button>
        </div>
        </div>
    </form>
@endsection
