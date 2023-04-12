<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_order_products', function (Blueprint $table) {
            $table->increments('order_product_id');
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->string('name', 255);
            $table->string('model', 255);
            $table->decimal('price', 15, 4);
            $table->integer('quantity');
            $table->decimal('total', 15, 4);
            $table->decimal('tax', 15, 4);
            $table->integer('reward');
            $table->foreign('order_id')->references('order_id')->on('kng_orders')->onDelete('cascade');
            $table->foreign('product_id')->references('product_id')->on('kng_products')->onDelete('cascade');
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
        Schema::drop('kng_order_products');
    }
}
