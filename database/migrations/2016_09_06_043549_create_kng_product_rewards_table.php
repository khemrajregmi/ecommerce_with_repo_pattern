<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngProductRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_product_rewards', function (Blueprint $table) {
            $table->increments('product_reward_id');
            $table->integer('product_id')->unsigned();
            $table->integer('customer_group_id')->unsigned();
            $table->integer('points');
            $table->foreign('product_id')->references('product_id')->on('kng_products');
            $table->foreign('customer_group_id')->references('customer_group_id')->on('kng_customer_groups');
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
        Schema::drop('kng_product_rewards');
    }
}
