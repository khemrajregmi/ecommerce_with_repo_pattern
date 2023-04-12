<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FamilywishProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_familywish_products', function (Blueprint $table) {
            $table->increments('familywish_product_id');
            $table->integer('f_s_w_id')->unsigned()->index();
            $table->integer('product_id')->unsigned()->index();
            $table->string('name');
            $table->integer('price');
            $table->integer('quantity');
            $table->foreign('f_s_w_id')->references('f_s_w_id')->on('kng_family_size_wishlists');
            $table->foreign('product_id')->references('product_id')->on('kng_products');
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
        Schema::drop('kng_familywish_products');
    }
}
