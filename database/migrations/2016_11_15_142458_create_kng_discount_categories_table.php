<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngDiscountCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_discount_categories', function (Blueprint $table) {
            $table->integer('discount_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->foreign('discount_id')->references('discount_id')->on('kng_discounts')->onDelete('cascade');
            $table->foreign('category_id')->references('category_id')->on('kng_categories')->onDelete('cascade');
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
        Schema::drop('kng_discount_categories');
    }
}
