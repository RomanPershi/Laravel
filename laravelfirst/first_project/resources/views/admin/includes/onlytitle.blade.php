<form onsubmit="submitingUpdate(this)" content="{{ csrf_token() }}" action="{{route('admin.update')}}" method="post">
    @csrf
    <div id="filter_parts" class="mt-lg-5">
        <label class="mt-4" for="filter_parts">Update Title</label>
        <input type="hidden" name="page" value="{{$some_table->currentPage()}}">
        <input type="hidden" name="url" value="{{$define}}">
        @foreach($some_table as $part_table)
            <div name="div_foreach">
                <button type="button" content="{{ csrf_token() }}" onclick='trash(this)' name="{{$part_table->id}}"
                        class="trash"><i
                        class="fas fa-trash-alt"></i></button>
                <input class="characteristics_value" name="{{$part_table->id}}"
                       value="{{$part_table->title}}">
            </div>
        @endforeach
    </div>
    <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Update</button>
    <div class="pagination_menu">
        {{$some_table->withQueryString()->links()}}
    </div>
</form>
