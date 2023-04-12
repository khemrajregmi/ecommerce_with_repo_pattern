<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_stores',function(Blueprint $table){
            $table->increments('store_id');
            $table->string('store_name');
            $table->string('store_phone');
            $table->string('store_logo');
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->string('street');
            $table->integer('state_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('location_id')->unsigned();
            $table->tinyInteger('dispatch')->default(1);
            $table->tinyInteger('collection')->default(1);
            $table->tinyInteger('delivery')->default(1);
            $table->string('about_store');
            $table->tinyInteger('email_order')->default(1);
            $table->string('order_email');
            $table->tinyInteger('sms_option')->default(1);
            $table->string('phone');
            $table->tinyInteger('automatic_order_assign')->default(0);
            $table->decimal('commission',15,4);
            $table->string('invoice_period');
            $table->text('meta_titles');
            $table->text('meta_keywords');
            $table->text('meta_description');
            $table->tinyInteger('status')->default(1);
            $table->foreign('state_id')->references('state_id')->on('kng_states');
            $table->foreign('city_id')->references('city_id')->on('kng_cities');
            $table->foreign('location_id')->references('area_id')->on('kng_areas');
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
        Schema::drop('kng_stores');
    }
}
