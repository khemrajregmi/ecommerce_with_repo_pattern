<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngFamilySizeWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_family_size_wishlists', function (Blueprint $table) {
            $table->increments('f_s_w_id');
            $table->integer('customer_id')->unsigned();
            $table->integer('customer_family_type_id')->unsigned();
            $table->integer('duration_id')->unsigned();
            $table->foreign('customer_id')->references('customer_id')->on('kng_customers');
            $table->foreign('customer_family_type_id')->references('customer_family_type_id')->on('kng_customer_family_types');
            $table->foreign('duration_id')->references('duration_id')->on('kng_durations');
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
        Schema::drop('kng_family_size_wishlists');
    }
}
