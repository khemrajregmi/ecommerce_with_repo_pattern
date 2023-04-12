<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_discounts', function (Blueprint $table) {
            $table->increments('discount_id');
            $table->integer('discount_type_id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->foreign('discount_type_id')->references('discount_type_id')->on('kng_discount_types');
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
        Schema::drop('kng_discounts');
    }
}
