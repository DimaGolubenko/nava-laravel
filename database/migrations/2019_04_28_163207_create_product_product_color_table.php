<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductProductColorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_product_color', function (Blueprint $table) {
            $table->integer('color_id')->references('id')->on('product_colors')->onDelete('CASCADE');
            $table->integer('product_id')->references('id')->on('products')->onDelete('CASCADE');
            $table->primary(['color_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_product_color');
    }
}
