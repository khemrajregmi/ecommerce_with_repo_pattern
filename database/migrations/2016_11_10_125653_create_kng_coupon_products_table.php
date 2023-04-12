<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngCouponProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_coupon_products', function (Blueprint $table) {
            $table->integer('coupon_id')->unsigned()->index();
            $table->integer('product_id')->unsigned()->index();
            $table->foreign('coupon_id')->references('coupon_id')->on('kng_coupons')->onDelete('cascade');
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
        Schema::drop('kng_coupon_products');
    }
}
