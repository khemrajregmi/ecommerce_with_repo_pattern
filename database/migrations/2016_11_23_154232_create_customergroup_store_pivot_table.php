<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomergroupStorePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_customergroup_store', function (Blueprint $table) {
            $table->integer('customer_group_id')->unsigned()->index();
            $table->foreign('customer_group_id')->references('customer_group_id')->on('kng_customer_groups')->onDelete('cascade');
            $table->integer('store_id')->unsigned()->index();
            $table->foreign('store_id')->references('store_id')->on('kng_stores')->onDelete('cascade');
           
            $table->primary(['customer_group_id','store_id']);
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
        Schema::drop('kng_customergroup_store');
    }
}
