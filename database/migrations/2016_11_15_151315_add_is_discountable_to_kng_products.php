<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsDiscountableToKngProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kng_products',function($table){
            $table->tinyInteger('is_discountable')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kng_products', function($table) {
            $table->dropColumn('is_discountable')->default(0);
        });
    }
}
