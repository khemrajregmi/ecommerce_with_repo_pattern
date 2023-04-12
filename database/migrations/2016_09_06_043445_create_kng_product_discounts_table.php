<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngProductDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_product_discounts', function (Blueprint $table) {
            $table->increments('product_discount_id');
            $table->integer('product_id')->unsigned();
            $table->integer('quantity');
            $table->integer('priority');
            $table->integer('percent');
            $table->date('date_start');
            $table->date('date_end');
            $table->foreign('product_id')->references('product_id')->on('kng_products')->onDelete('cascade');;
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
        Schema::drop('kng_product_discounts');
    }
}
