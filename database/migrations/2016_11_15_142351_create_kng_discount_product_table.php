<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngDiscountProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_discount_products', function (Blueprint $table) {
            $table->integer('discount_id')->unsigned()->index();
            $table->integer('product_id')->unsigned()->index();
            $table->foreign('discount_id')->references('discount_id')->on('kng_discounts')->onDelete('cascade');
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
        Schema::drop('kng_discount_products');
    }
}
