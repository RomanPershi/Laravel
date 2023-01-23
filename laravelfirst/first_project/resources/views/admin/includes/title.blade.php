<meta name="csrf-token" content="{{ csrf_token() }}">
<label for="exampleInputEmail1">Total:</label>
<span id="total_elements">{{$some_table->total()}}</span>
<br>
<label for="exampleInputEmail1">On this page:</label>
<span id="count_elements">{{$some_table->count()}}</span>
<br>
<label for="exampleInputEmail1">maximum on this page:</label>
<span id="max_count">{{$count}}</span>
<br>
<label for="exampleInputEmail1">Table:</label>
<span id="define">{{$define}}</span>
<br>
<span style="display: none;" id="page">{{$some_table->currentPage()}}</span>
