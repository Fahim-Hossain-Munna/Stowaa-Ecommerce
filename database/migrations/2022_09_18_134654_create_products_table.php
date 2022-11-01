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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id');
            $table->integer('category_id');
            $table->string('product_name');
            $table->longText('product_description');
            $table->float('product_regular_price', 8,2);
            $table->float('product_discunted_price', 8,2)->nullable();
            $table->text('product_short_description')->nullable();
            $table->longText('product_additional_description')->nullable();
            $table->string('product_picture')->nullable();
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
        Schema::dropIfExists('products');
    }
};
