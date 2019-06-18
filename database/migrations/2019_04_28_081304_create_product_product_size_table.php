<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductProductSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_product_size', function (Blueprint $table) {
            $table->integer('size_id')->references('id')->on('product_sizes')->onDelete('CASCADE');
            $table->integer('product_id')->references('id')->on('products')->onDelete('CASCADE');
            $table->primary(['size_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_product_size');
    }
}
