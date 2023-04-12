<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_countries', function (Blueprint $table) {
            $table->increments('country_id');
            $table->string('name');
            $table->string('iso');
            $table->string('phone_code');
            $table->string('currency_name');
            $table->string('currency_code');
            $table->softDeletes();
            $table->string('currency_symbol');
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
        Schema::drop('kng_countries');
    }
}
