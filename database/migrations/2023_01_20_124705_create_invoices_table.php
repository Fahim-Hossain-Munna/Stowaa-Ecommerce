<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_contact_number');
            $table->string('customer_country_code');
            $table->string('customer_city_code');
            $table->longText('customer_address');
            $table->longText('customer_remark')->nullable();
            $table->string('coupon_name')->nullable();
            $table->string('discounted_amount')->nullable();
            $table->string('shipping_charge');
            $table->string('product_subtotal');
            $table->string('product_round_final_total');
            $table->string('payment_method');
            $table->string('payment_status')->default('unpaid');
            $table->string('order_status')->default('processing');
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
        Schema::dropIfExists('invoices');
    }
};
