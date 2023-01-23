<form onsubmit="submiting(this)" action="{{route('admin.store')}}" id="create_form" method="post"
      enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="url" value="{{$define}}">
    <div class="{{$define}}">
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button style="margin-top: 10px;" type="submit" class="btn btn-primary" id="upload">Create</button>
    </div>
</form>
