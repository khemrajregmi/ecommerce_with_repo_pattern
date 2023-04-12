<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngCustomerWishlists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_customer_wishlists', function (Blueprint $table) {
            $table->integer('customer_id')->unsigned()->index();
            $table->integer('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('product_id')->on('kng_products')->onUpdate('cascade');
            $table->foreign('customer_id')->references('customer_id')->on('kng_customers')->onUpdate('cascade');
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
        Schema::drop('kng_customer_wishlists');
    }
}
