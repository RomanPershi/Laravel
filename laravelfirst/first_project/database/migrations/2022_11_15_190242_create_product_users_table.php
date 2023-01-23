<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_users', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id');

            $table->index('product_id','product_user_product_idx');
            $table->index('user_id','product_user_user_idx');

            $table->foreign('product_id','product_user_product_fk')->on('users')->references('id');
            $table->foreign('user_id','product_user_user_fk')->on('products')->references('id');

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
        Schema::dropIfExists('product_users');
    }
}
