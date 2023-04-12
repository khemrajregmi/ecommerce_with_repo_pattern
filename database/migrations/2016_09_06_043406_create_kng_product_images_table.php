<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_product_images', function (Blueprint $table) {
            $table->increments('product_image_id');
            $table->integer('product_id')->unsigned();
            $table->string('image', 255);
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
        Schema::drop('kng_product_images');
    }
}
