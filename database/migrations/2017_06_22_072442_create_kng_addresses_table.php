<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_addresses', function (Blueprint $table) {
            $table->increments('address_id');
            $table->integer('customer_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('area_id')->unsigned();
            $table->string('address_1');
            $table->string('address_2');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('telephone');
            $table->string('company');
            $table->string('postcode');
            $table->string('custom_field');
            $table->softDeletes();
            $table->foreign('customer_id')->references('customer_id')->on('kng_customers');
            $table->foreign('country_id')->references('country_id')->on('kng_countries');
            $table->foreign('state_id')->references('state_id')->on('kng_states');
            $table->foreign('city_id')->references('city_id')->on('kng_cities');
            $table->foreign('area_id')->references('area_id')->on('kng_areas');
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
        Schema::dropIfExists('kng_addresses');
    }
}
