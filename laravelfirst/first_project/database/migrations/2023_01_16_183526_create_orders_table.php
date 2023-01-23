<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->date('delivery_date')->nullable();
            $table->boolean('status_pay')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->index('user_id', 'order_user_idx');
            $table->foreign('user_id', 'order_user_fk')->on('users')->references('id');

            $table->unsignedBigInteger('house_number')->nullable();
            $table->unsignedBigInteger('apartment_number')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
