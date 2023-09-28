<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('product_name');
            $table->unsignedBigInteger('product_quantity');
            $table->string('product_slug');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->string('product_desc');
            $table->string('product_content');
            $table->unsignedBigInteger('product_new_price');
            $table->unsignedBigInteger('product_old_price');
            $table->string('product_image');
            $table->integer('product_weight');
            $table->integer('product_life');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('product_status');
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
}
