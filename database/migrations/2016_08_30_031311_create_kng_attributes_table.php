<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_attributes', function (Blueprint $table) {
            $table->increments('attribute_id');
            $table->string('name',255);
            $table->integer('attribute_group_id')->unsigned();
            $table->foreign('attribute_group_id')->references('attribute_group_id')->on('kng_attribute_groups');
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
        Schema::drop('kng_attributes');
    }
}
