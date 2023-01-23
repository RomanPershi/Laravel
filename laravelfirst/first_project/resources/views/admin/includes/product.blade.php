<br>
<label style="display: none;" for="exampleInputEmail1">Page:</label>
<label class="mt-4" for="filter_parts">Products</label>
<?php $count_forms = 0; ?>
<div class="pagination_menu">
    {!! $some_table->links() !!}
</div>
@foreach($some_table as $part_table)
        <?php $count_forms++; ?>
    <div id="{{$count_forms}}" class="product_form">
        <div class="product_photo">
            <img class="img_block" src="{{asset('products/img/'.$part_table->title.'.png')}}" alt="">
        </div>
        <div class="product_info">
                <?php $type_connect = $part_table->type_connect == 0 ? 'wired' : 'Unwired' ?>
            <a class="form_link" href="{{route('admin.product',$part_table->id)}}">
                <div class="link_field">
                    Keyboard {{$type_connect.' '.$part_table->Manufacturer->title.' '.$part_table->title}}
                    [{{$part_table->TypeKeyboard->title.', keys - '.$part_table->keys.', '.$part_table->InterfaceConnect->title.' ,'.$part_table->KeyboardColor->title}}
                    ]
                </div>
            </a>
            <div class="product_count">
                <button content="{{ csrf_token() }}" onclick='ajaxCount(this)' sign="plus" name="{{$part_table->id}}"
                        class="sign_button"><i class="fas fa-plus"></i></button>
                <div class="count_number">{{$part_table->count}}</div>
                <button content="{{ csrf_token() }}" onclick='ajaxCount(this)' sign="minus" name="{{$part_table->id}}"
                        class="sign_button"><i class="fas fa-minus"></i></button>
                <div class="trash_block">
                    <button content="{{ csrf_token() }}" onclick='trash(this)' title="{{$part_table->title}}" name="{{$part_table->id}}" class="trash">
                        <i
                            class="fas fa-trash-alt"></i></button>
                </div>
            </div>
        </div>
    </div>
@endforeach
