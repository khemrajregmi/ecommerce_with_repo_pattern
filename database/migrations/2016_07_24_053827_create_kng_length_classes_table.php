<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatekngLengthClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_length_classes', function (Blueprint $table) {
            $table->increments('length_class_id');
            $table->string('title',32);
            $table->string('unit',4);
            $table->decimal('value',15,8);
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
        Schema::drop('kng_length_classes');
    }
}
