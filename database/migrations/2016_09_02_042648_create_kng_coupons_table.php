<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_coupons', function (Blueprint $table) {
            $table->increments('coupon_id');
            $table->string('name',128);
            $table->string('code',20);
            $table->char('type',1);
            $table->decimal('discount',15,4);
            $table->tinyInteger('logged');
            $table->tinyInteger('shipping');
            $table->decimal('total',15,4);
            $table->date('date_start');
            $table->date('date_end');
            $table->integer('uses_total');
            $table->string('uses_customer');
            $table->tinyInteger('status');
            $table->softDeletes();
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
        Schema::drop('kng_coupons');
    }
}
