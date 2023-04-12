<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('name', 255);
            $table->string('slug', 32);
            $table->text('description');
            $table->text('tag');
            $table->string('model', 64);
            $table->string('sku', 64);
            $table->integer('quantity');
            $table->integer('stock_status_id')->unsigned();
            $table->string('image', 255);
            $table->integer('manufacturer_id')->unsigned();
            $table->tinyInteger('shipping');
            $table->tinyInteger('newarrival');
            $table->decimal('price', 15, 4);
            $table->decimal('weight', 15, 4);
            $table->integer('weight_class_id')->unsigned();
            $table->decimal('length', 15, 8);
            $table->decimal('height', 15, 8);
            $table->decimal('width', 15, 8);
            $table->integer('length_class_id')->unsigned();
            $table->tinyInteger('subtract')->default(1);
            $table->tinyInteger('status')->default(0);
            $table->integer('viewed');
            $table->integer('minimum');
            $table->string('meta_title', 255);
            $table->string('meta_description', 255);
            $table->string('meta_keywords', 255);
            $table->foreign('stock_status_id')->references('stock_status_id')->on('kng_stock_statuses');
            $table->foreign('weight_class_id')->references('weight_class_id')->on('kng_weight_classes');
            $table->foreign('length_class_id')->references('length_class_id')->on('kng_length_classes');
            $table->foreign('manufacturer_id')->references('manufacturer_id')->on('kng_manufacturers');
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
        Schema::drop('kng_products');
    }
}
