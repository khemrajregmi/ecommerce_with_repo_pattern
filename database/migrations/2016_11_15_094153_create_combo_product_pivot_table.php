<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComboProductPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_combo_offer_product', function (Blueprint $table) {
            $table->integer('combo_id')->unsigned()->index();
            $table->foreign('combo_id')->references('combo_offer_id')->on('kng_combo_offers')->onDelete('cascade');
            $table->integer('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('product_id')->on('kng_products')->onDelete('cascade');
            $table->primary(['combo_id', 'product_id']);
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
        Schema::drop('kng_combo_offer_product');
    }
}
