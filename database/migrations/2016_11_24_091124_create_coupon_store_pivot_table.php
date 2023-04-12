<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponStorePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('kng_coupon_store', function (Blueprint $table) {
            $table->integer('coupon_id')->unsigned()->index();
            $table->foreign('coupon_id')->references('coupon_id')->on('kng_coupons')->onDelete('cascade');
            $table->integer('store_id')->unsigned()->index();
            $table->foreign('store_id')->references('store_id')->on('kng_stores')->onDelete('cascade');
           
            $table->primary(['coupon_id','store_id']);
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
        Schema::drop('kng_coupon_store');
    }
}
