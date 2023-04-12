<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKngOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kng_orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('invoice_no')->unsigned();
            $table->string('invoice_prefix', 26);
            $table->integer('store_id')->unsigned();
            $table->string('store_url', 255);
            $table->integer('customer_id')->unsigned();
            $table->integer('customer_group_id')->unsigned();
            $table->string('firstname', 32);
            $table->string('lastname', 32);
            $table->string('email', 96);
            $table->string('telephone', 96);
            $table->string('fax', 96);
            $table->text('customer_field');
            $table->string('payment_firstname', 32);
            $table->string('payment_lastname', 32);
            $table->string('payment_company', 60);
            $table->string('payment_address_1', 128);
            $table->string('payment_address_2', 128);
            $table->string('payment_postcode', 10);
            $table->integer('payment_country_id')->unsigned();;
            $table->integer('payment_state_id')->unsigned();;
            $table->integer('payment_city_id')->unsigned();;
            $table->integer('payment_area_id')->unsigned();;
            $table->string('payment_method',128);
            $table->string('payment_code',128);
            $table->string('shipping_firstname',128);
            $table->string('shipping_lastname',128);
            $table->string('shipping_company',128);
            $table->string('shipping_address_1',128);
            $table->string('shipping_address_2',128);
            $table->string('shipping_postcode',10);
            $table->integer('shipping_country_id')->unsigned();;
            $table->integer('shipping_state_id')->unsigned();;
            $table->integer('shipping_city_id')->unsigned();;
            $table->integer('shipping_area_id')->unsigned();;
            $table->string('shipping_method',128);
            $table->string('shipping_code',128);
            $table->text('comment');
            $table->decimal('total', 15, 4);
            $table->integer('order_status_id')->unsigned();
            $table->integer('affiliate_id')->unsigned();
            $table->decimal('commission', 15, 4);
            $table->string('tracking',128);
            $table->integer('currency_id')->unsigned();
            $table->string('ip',40);
            $table->string('forwarded_ip',128);
            $table->string('user_agent',255);
            $table->foreign('order_status_id')->references('order_status_id')->on('kng_order_statuses');
            $table->foreign('customer_group_id')->references('customer_group_id')->on('kng_customer_groups');
            $table->foreign('customer_id')->references('customer_id')->on('kng_customers');
            $table->foreign('payment_country_id')->references('country_id')->on('kng_countries');
            $table->foreign('shipping_country_id')->references('country_id')->on('kng_countries');
            $table->foreign('payment_state_id')->references('state_id')->on('kng_states');
            $table->foreign('shipping_state_id')->references('state_id')->on('kng_states');
            $table->foreign('payment_city_id')->references('city_id')->on('kng_cities');
            $table->foreign('shipping_city_id')->references('city_id')->on('kng_cities');
            $table->foreign('payment_area_id')->references('area_id')->on('kng_areas');
            $table->foreign('shipping_area_id')->references('area_id')->on('kng_areas');
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
        Schema::drop('kng_orders');
    }
}
