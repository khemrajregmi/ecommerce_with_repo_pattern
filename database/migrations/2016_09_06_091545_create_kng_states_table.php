<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_states', function (Blueprint $table) {
            $table->increments('state_id');
            $table->integer('country_id')->unsigned();
            $table->string('name',128);
            $table->tinyInteger('status')->default(0);
            $table->foreign('country_id')->references('country_id')->on('kng_countries');
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
        Schema::drop('kng_states');
    }
}
