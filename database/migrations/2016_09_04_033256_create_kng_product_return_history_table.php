<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngProductReturnHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_product_return_history', function (Blueprint $table) {
            $table->increments('product_return_history_id');
            $table->integer('product_return_id')->unsigned();
            $table->integer('product_return_status_id')->unsigned();
            $table->tinyInteger('notify')->default(0);
            $table->foreign('product_return_id')->references('product_return_id')->on('kng_product_returns');
            $table->foreign('product_return_status_id')->references('product_return_status_id')->on('kng_product_return_statuses');
            $table->string('comment',255);
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
        Schema::drop('kng_product_return_history');
    }
}
