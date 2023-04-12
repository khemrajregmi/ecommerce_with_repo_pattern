<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_vouchers', function (Blueprint $table) {
            $table->increments('voucher_id');
            $table->integer('order_id');
            $table->string('code',255);
            $table->string('from_name',255);
            $table->string('from_email',255);
            $table->string('to_email',255);
            $table->string('to_name',255);
            $table->integer('voucher_theme_id')->unsigned();
            $table->text('message');
            $table->decimal('amount',15,8);
            $table->tinyInteger('status');
            $table->foreign('voucher_theme_id')->references('voucher_theme_id')->on('kng_voucher_themes');
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
        Schema::drop('kng_vouchers');
    }
}
