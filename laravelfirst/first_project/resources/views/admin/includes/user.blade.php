<br>
<div class="pagination_menu">
    {!! $some_table->links() !!}
</div>
@foreach($some_table as $part_table)
    @if($part_table->role_id != 1 && $part_table->role_id != 3)
        <div class="user_form">
            <div class="trash_user_block">
                <button content="{{ csrf_token() }}" onclick='trash(this)' title="{{$part_table->title}}"
                        name="{{$part_table->id}}" class="trash">
                    <i class="fas fa-trash-alt"></i></button>
            </div>
            <div style="cursor: default;" class="form_link">
                <div class="link_field">
                    Name - {{$part_table->name}}, Email - {{$part_table->email}} , Role
                    - {{$part_table->role->title}}
                </div>
            </div>
        </div>
    @endif
@endforeach
