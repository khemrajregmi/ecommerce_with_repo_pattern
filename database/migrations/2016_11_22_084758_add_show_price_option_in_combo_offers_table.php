<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddShowPriceOptionInComboOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kng_combo_offers',function(Blueprint $table){
           $table->tinyInteger('show_mrp')->default(0);
           $table->tinyInteger('show_sp')->default(0);
           $table->tinyInteger('show_cp')->default(1);
           $table->tinyInteger('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kng_combo_offers',function(Blueprint $table){
           $table->dropColumn('show_mrp');
           $table->dropColumn('show_sp');
           $table->dropColumn('show_cp');
            $table->dropColumn('status');
        });
    }
}
