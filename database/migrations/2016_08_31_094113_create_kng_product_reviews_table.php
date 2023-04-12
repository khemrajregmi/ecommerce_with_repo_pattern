<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngProductReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_product_reviews', function (Blueprint $table) {
            $table->increments('product_review_id');
            $table->integer('product_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->string('author',255);
            $table->text('text');
            $table->integer('rating');
            $table->tinyInteger('status')->default(0);
            $table->foreign('product_id')->references('product_id')->on('kng_products');
            $table->foreign('customer_id')->references('customer_id')->on('kng_customers');
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
        Schema::drop('kng_product_reviews');
    }
}
