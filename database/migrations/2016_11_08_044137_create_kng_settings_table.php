<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_settings', function (Blueprint $table) {
            $table->increments('setting_id');
            $table->string('code',32);
            $table->string('key',32);
            $table->text('value');
            $table->tinyInteger('serialized');
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
        Schema::drop('kng_settings');
    }
}
