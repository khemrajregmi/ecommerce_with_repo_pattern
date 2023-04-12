<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_categories', function (Blueprint $table) {
            $table->increments('category_id');
            $table->string('name',255);
            $table->text('description');
            $table->string('image',255);
            $table->integer('parent_id')->unsigned()->nullable()->default(null);
            $table->string('meta_title',255);
            $table->string('meta_description',255);
            $table->string('meta_keyword',255);
            $table->tinyInteger('status')->default(0);
            $table->foreign('parent_id')->references('category_id')->on('kng_categories');
            
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
        Schema::drop('kng_categories');
    }
}
