<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherStorePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_voucher_store', function (Blueprint $table) {
            $table->integer('voucher_id')->unsigned()->index();
            $table->foreign('voucher_id')->references('voucher_id')->on('kng_vouchers')->onDelete('cascade');
            $table->integer('store_id')->unsigned()->index();
            $table->foreign('store_id')->references('store_id')->on('kng_stores')->onDelete('cascade');
           
            $table->primary(['voucher_id','store_id']);
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
        Schema::drop('kng_voucher_store');
    }
}
