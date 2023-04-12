<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngOrderHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_order_history', function (Blueprint $table) {
            $table->increments('order_history_id');
            $table->integer('order_id')->unsigned();
            $table->integer('order_status_id')->unsigned();
            $table->tinyInteger('notify')->default(0);
            $table->text('comment');
            $table->foreign('order_status_id')->references('order_status_id')->on('kng_order_statuses');
            $table->foreign('order_id')->references('order_id')->on('kng_orders');
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
        Schema::drop('kng_order_history');
    }
}
