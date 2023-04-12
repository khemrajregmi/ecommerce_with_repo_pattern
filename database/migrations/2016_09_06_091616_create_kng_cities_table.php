<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_cities', function (Blueprint $table) {
            $table->increments('city_id');
            $table->integer('country_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->string('name',128);
            $table->tinyInteger('status')->default(0);
            $table->foreign('country_id')->references('country_id')->on('kng_countries');
            $table->foreign('state_id')->references('state_id')->on('kng_states');
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
        Schema::drop('kng_cities');
    }
}
