<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_areas', function (Blueprint $table) {
            $table->increments('area_id');
            $table->integer('state_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->string('name',128);
            $table->string('zip_code',128);
            $table->tinyInteger('status')->default(0);
            $table->foreign('state_id')->references('state_id')->on('kng_states');
            $table->foreign('city_id')->references('city_id')->on('kng_cities');
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
        Schema::drop('kng_areas');
    }
}
