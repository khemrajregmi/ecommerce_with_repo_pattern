<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngComboOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_combo_offers', function (Blueprint $table) {
            $table->increments('combo_offer_id');
            $table->integer('combo_type_id')->unsigned();
            $table->string('combo_name');
            $table->decimal('combo_price');
            $table->integer('category_id')->unsigned();
            $table->foreign('combo_type_id')->references('combo_type_id')->on('kng_combo_types');
            $table->foreign('category_id')->references('category_id')->on('kng_categories');
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
        Schema::drop('kng_combo_offers');
    }
}
