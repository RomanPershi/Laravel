@extends('layouts.main')
@section('foothead')
    <?php include(app_path() . '/php/admin_lib.php') ?>
    <?php include(app_path() . '/php/baskedButton.php') ?>
    <link rel="stylesheet" href="{{asset('css/product.css')}}">
    <link rel="stylesheet" href="{{asset('css/shopProduct.css')}}">

    <div style="color:#fff;" class="main_shop">
        <div class="container">
            <div class="main_title_page">Keyboard {{$field->Manufacturer->title.' '.$field->title}}</div>
            <br>
            <div class="page_product">
                <div class="block_photo">
                    <img class="page_img" src="{{asset('products/img/'.$field->title.'.png')}}" alt="">
                    <div class="add_product">
                        <button name="basked" onclick="basked(this)"
                                value={{$field->id}} class={{getBaskedName($field->id,$cookie,'basked_remove','basked_add')}}>
                            {{getBaskedName($field->id,$cookie,'Remove from cart','Add to cart')}}
                        </button>
                        <div class="price">
                            {{$field->price}}$
                        </div>
                    </div>
                </div>
                <img class="product_img" id="blah" src="#" alt=""/>
                <div class="characteristics">
                    <div class="characteristics_title">Characteristics
                        Keyboard {{$field->Manufacturer->title.' '.$field->title}}</div>
                    <div class="characteristics_subtype">
                        <div class="subtype_title">Appearance</div>
                        {{characterShopOut($field->ColorKey->title,'Color Keys')}}
                        {{characterShopOut($field->KeyboardColor->title,'Color Keyboard')}}
                    </div>
                    <div class="characteristics_subtype">
                        <div class="subtype_title">Classification</div>
                        <div class="characteristics_part">
                            <div class="text_part">Keys</div>
                            <div class="characteristics_value">{{$field->keys}}</div>
                        </div>
                        {{characterShopBoolOut($field->is_noising,'Silent Keys','No','Yes')}}
                        {{characterShopOut($field->TypeKeyboard->title,'Type Keyboard')}}
                        {{characterShopOut($field->Manufacturer->title,'Manufacturer')}}
                        {{characterShopBoolOut($field->is_gaming,'Is Gaming','No','Yes')}}
                        <div class="characteristics_part">
                            <div class="text_part">Model</div>
                            <div class="characteristics_value">{{$field->title}}</div>
                        </div>
                    </div>
                    <div class="characteristics_subtype">
                        <div class="subtype_title">Functionality</div>
                        {{characterShopBoolOut($field->number_block,'Number Block','No','Yes')}}
                    </div>
                    <div class="characteristics_subtype">
                        <div class="subtype_title">Connection</div>
                        {{characterShopBoolOut($field->type_connect,'Type Connect','Unwired','Wired')}}
                        {{characterShopOut($field->InterfaceConnect->title,'Interface Connect')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
