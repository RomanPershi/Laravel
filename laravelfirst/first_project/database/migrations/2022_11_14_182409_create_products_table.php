<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->unsignedBigInteger('count');

            $table->unsignedBigInteger('price');

            $table->unsignedBigInteger('manufacturer_id');
            $table->index('manufacturer_id','product_manufacturer_idx');
            $table->foreign('manufacturer_id','product_manufacturer_fk')->on('manufacturers')->references('id');

            $table->boolean('is_gaming');

            $table->unsignedBigInteger('type_keyboard_id');
            $table->index('type_keyboard_id','product_type_keyboard_idx');
            $table->foreign('type_keyboard_id','product_type_keyboard_fk')->on('type_keyboards')->references('id');

            $table->boolean('type_connect');

            $table->boolean('number_block');

            $table->unsignedBigInteger('interface_connect_id');
            $table->index('interface_connect_id','product_interface_connect_idx');
            $table->foreign('interface_connect_id','product_interface_connect_fk')->on('interface_connects')->references('id');

            $table->unsignedBigInteger('keys');

            $table->unsignedBigInteger('color_keys_id');
            $table->index('color_keys_id','product_color_keys_idx');
            $table->foreign('color_keys_id','product_color_keys_fk')->on('color_keys')->references('id');

            $table->unsignedBigInteger('keyboard_color_id');
            $table->index('keyboard_color_id','product_keyboard_color_idx');
            $table->foreign('keyboard_color_id','product_keyboard_color_fk')->on('keyboard_colors')->references('id');

            $table->boolean('is_noising');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
