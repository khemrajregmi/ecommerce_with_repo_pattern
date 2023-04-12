<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_product_attributes', function (Blueprint $table) {
            $table->increments('product_attribute_id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('product_id')->on('kng_products');

            $table->integer('attribute_id')->unsigned();
            $table->foreign('attribute_id')->references('attribute_id')->on('kng_attributes');
            $table->string('text',255);
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
        Schema::drop('kng_product_attributes');
    }
}
