<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order__products', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->index('product_id', 'order__products_product_idx');
            $table->foreign('product_id', 'order__products_product_fk')->on('products')->references('id');

            $table->unsignedBigInteger('order_id');
            $table->index('order_id', 'order__products_order_idx');
            $table->foreign('order_id', 'order__products_order_fk')->on('orders')->references('id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order__products');
    }
}
