<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageToKngCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kng_customers',function($table){
           $table->string('image', 128);
           $table->string('remember_token', 256);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kng_customers', function($table) {
            $table->dropColumn('image');
            $table->dropColumn('remember_token');
        });
    }
}
