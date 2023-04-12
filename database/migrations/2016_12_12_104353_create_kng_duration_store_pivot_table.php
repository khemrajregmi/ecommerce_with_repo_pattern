<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngDurationStorePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_duration_store', function (Blueprint $table) {
            $table->integer('duration_id')->unsigned()->index();
            $table->foreign('duration_id')->references('duration_id')->on('kng_durations')->onDelete('cascade');
            $table->integer('store_id')->unsigned()->index();
            $table->foreign('store_id')->references('store_id')->on('kng_stores')->onDelete('cascade');
            $table->primary(['duration_id', 'store_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kng_duration_store');
    }
}
