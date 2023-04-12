<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngProductCustSugt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_product_cust_sugts', function (Blueprint $table) {
            $table->increments('product_cus_sug_id');
            $table->integer('customer_id')->unsigned()->index();
            $table->string('product_name');
            $table->string('model');
            $table->string('brand');
            $table->text('message');
            $table->softDeletes();
            $table->foreign('customer_id')->references('customer_id')->on('kng_customers')->onDelete('cascade');
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
        Schema::drop('kng_product_cust_sugts');
    }
}
