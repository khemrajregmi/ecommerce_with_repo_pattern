<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CrateKngProductReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_product_returns', function (Blueprint $table) {
            $table->increments('product_return_id');
            $table->integer('order_id');
            $table->integer('product_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->string('firstname',255);
            $table->string('lastname',255);
            $table->string('email',255);
            $table->string('telephone',255);
            $table->string('product',255);
            $table->string('model',255);
            $table->integer('quantity')->unsigned();
            $table->tinyInteger('opened')->default(0);
            $table->integer('product_return_reason_id')->unsigned();
            $table->integer('product_return_action_id')->unsigned();
            $table->integer('product_return_status_id')->unsigned();
            $table->text('comment');
            $table->date('date_ordered');
            $table->foreign('product_id')->references('product_id')->on('kng_products');
            $table->foreign('customer_id')->references('customer_id')->on('kng_customers');
            $table->foreign('product_return_reason_id')->references('product_return_reason_id')->on('kng_product_return_reasons');
            $table->foreign('product_return_action_id')->references('product_return_action_id')->on('kng_product_return_actions');
            $table->foreign('product_return_status_id')->references('product_return_status_id')->on('kng_product_return_statuses');
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
        Schema::drop('kng_product_returns');
    }
}
