<form onsubmit="submiting(this)" action="{{route('admin.store')}}" id="create_form" method="post"
      enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="url" value="{{$define}}">
    <button id="show" class="{{$define}}_scroll" type="button">
        Add Product
        <i class="fas fa-eye"></i>
    </button>
    <div class="{{$define}}">
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
            {{constructListProduct($manufacturer,'Manufacturer','manufacturer_id')}}
            {{constructListProduct($color_keys,'Color Keys','color_keys_id')}}
            {{constructListProduct($keyboard_color,'Keyboard Color','keyboard_color_id')}}
            {{constructListProduct($interface_connect,'Interface Connect','interface_connect_id')}}
            {{constructListProduct($type_keyboard,'Type Keyboard','type_keyboard_id')}}
            {{constructBoolProduct('Is Gaming','is_gaming')}}
            {{constructBoolProduct('Number Block','number_block')}}
            {{constructBoolProduct('Silent Keys','is_noising')}}
            <label>Type Connect</label>
            <select name="type_connect" class='form-control'>
                <option value='0'>Wired</option>
                <option value='1'>Unwired</option>
            </select>
            <label>Count</label>
            <input type="text" name="count" class="form-control" id="title" placeholder="Count">
            @error('count')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <label>Price</label>
            <input type="text" name="price" class="form-control" id="title" placeholder="Price">
            @error('price')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <label>Keys</label>
            <input type="text" name="keys" class="form-control" id="title" placeholder="Keys">
            @error('keys')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <img class="product_img" id="blah" src="#" alt=""/>
            <input name="mainfile" class="mt-3" type="file" id="document_attachment_doc"/>
        </div>
        <button style="margin-top: 10px;" type="submit" class="btn btn-primary" id="upload">Create</button>
    </div>
</form>
