<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSettingTableColumnLength extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kng_settings',function(Blueprint $table){
           $table->string('code',100)->change();
           $table->string('key',100)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('kng_settings',function($table){
//            $table->string('code',32);
//            $table->string('key',32);
//        });
    }
}
