<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_customers', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->integer('customer_group_id')->unsigned();
            $table->integer('store_id');
            $table->integer('language_id')->nullable();
            $table->string('firstname',64);
            $table->string('lastname',64);
            $table->string('email',64);
            $table->string('password',255);
            $table->string('telephone',64)->nullable();
            $table->string('fax',64)->nullable();
            $table->text('cart')->nullable();
            $table->text('wishlist')->nullable();
            $table->tinyInteger('newsletter')->nullable();
            $table->integer('address_id')->nullable();
            $table->text('custom_field')->nullable();
            $table->string('ip',64);
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('approved')->nullable();
            $table->tinyInteger('safe')->nullable();
            $table->foreign('customer_group_id')->references('customer_group_id')->on('kng_customer_groups');
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
        Schema::drop('kng_customers');
    }
}
