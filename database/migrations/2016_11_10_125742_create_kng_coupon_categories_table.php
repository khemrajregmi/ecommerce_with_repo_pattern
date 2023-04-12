<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngCouponCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_coupon_categories', function (Blueprint $table) {
            $table->integer('coupon_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->foreign('coupon_id')->references('coupon_id')->on('kng_coupons')->onDelete('cascade');
            $table->foreign('category_id')->references('category_id')->on('kng_categories')->onDelete('cascade');
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
        Schema::drop('kng_coupon_categories');
    }
}
