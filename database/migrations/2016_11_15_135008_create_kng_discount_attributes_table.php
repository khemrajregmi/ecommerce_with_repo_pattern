<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngDiscountAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_discount_attributes', function (Blueprint $table) {
            $table->increments('discount_attribute_id');
            $table->integer('discount_id')->unsigned();
            $table->decimal('amount', 15, 2);
            $table->decimal('percentage');
            $table->decimal('min_bill_amount', 15, 2);
            $table->decimal('total_min_quantity', 15, 2);
            $table->decimal('additional_quantity', 15, 2);
            $table->foreign('discount_id')->references('discount_id')->on('kng_discounts');
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
        Schema::drop('kng_discount_attributes');
    }
}
