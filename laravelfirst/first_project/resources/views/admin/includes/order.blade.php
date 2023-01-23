<br>
<div class="pagination_menu">
    {!! $some_table->links() !!}
</div>
@foreach($some_table as $part_table)
    <div class="user_form">
            <?php
            if ($part_table->status_pay == NULL)
                $status = 'NULL';
            if ($part_table->status_pay == 1)
                $status = 'Paid';
            if ($part_table->status_pay == 2)
                $status = 'Denied';
            ?>
        <div style="cursor: default;" class="form_link">
            <div class="link_field">
                <a class="form_link" href="{{route('admin.order',$part_table->id)}}">
                    Order - {{$part_table->id}}, Name - {{$part_table->user->name}}, Delivery Date
                    - {{$part_table->delivery_date}}, StatusPay - {{$status}}
                </a>
            </div>
        </div>
    </div>
@endforeach

