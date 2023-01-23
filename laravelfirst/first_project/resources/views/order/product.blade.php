<?php include(app_path() . '/php/baskedButton.php') ?>
@if ($cookie == NULL)
    <div class="empty_cart">Cart is empty</div>
@else
    <br>
        <?php $count_forms = 0; ?>
    <br>
    <br>
    <label class="mt-1" style="font-size:20px;color: #ff0099;" for="filter_parts">Cart</label>
    @foreach($some_table as $part_table)
            <?php $count_forms++; ?>
        <div id="{{$count_forms}}" class="product_form">
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
                <br>
                <div class="add_product">
                    <button name="basked" onclick="cart(this)"
                            value={{$part_table->id}} class={{getBaskedName($part_table->id,$cookie,'basked_remove','basked_add')}}>
                        {{getBaskedName($part_table->id,$cookie,'Remove from cart','Add to cart')}}
                    </button>
                    <div class="price">
                        {{$part_table->price}}$
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
