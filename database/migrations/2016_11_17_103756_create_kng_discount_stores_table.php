<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngDiscountStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_discount_stores', function (Blueprint $table) {
            $table->integer('discount_id')->unsigned()->index();
            $table->integer('store_id')->unsigned()->index();
            $table->foreign('discount_id')->references('discount_id')->on('kng_discounts')->onDelete('cascade');
            $table->foreign('store_id')->references('store_id')->on('kng_stores')->onDelete('cascade');
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
        Schema::drop('kng_discount_stores');
    }
}
