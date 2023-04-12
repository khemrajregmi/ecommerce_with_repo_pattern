<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngBannerImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_banner_images', function (Blueprint $table) {
            $table->increments('banner_image_id');
            $table->integer('banner_id')->unsigned();
            $table->integer('language_id');
            $table->string('title', 128);
            $table->string('link', 128);
            $table->string('image', 128);
            $table->integer('sort_order');
            $table->softDeletes();
            $table->foreign('banner_id')->references('banner_id')->on('kng_banners');
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
        Schema::drop('kng_banner_images');
    }
}
