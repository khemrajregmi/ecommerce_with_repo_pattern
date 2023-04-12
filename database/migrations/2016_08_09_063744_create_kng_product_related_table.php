<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngProductRelatedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_product_related', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('related_id')->unsigned();
            $table->foreign('product_id')->references('product_id')->on('kng_products');
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
        Schema::drop('kng_product_related');
    }
}
