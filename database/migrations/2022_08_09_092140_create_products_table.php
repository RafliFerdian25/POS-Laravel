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
            $table->string("id", 15)->primary();
            $table->string('category_id', 3);
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnUpdate();
            $table->string('name');
            $table->unsignedBigInteger('merk_id');
            $table->foreign('merk_id')->references('id')->on('merks')->cascadeOnUpdate();
            $table->string('unit', 5);
            $table->integer('contain');
            $table->integer('purchase_price');
            $table->integer('selling_price');
            $table->integer('wholesale_price');
            $table->date('expired_date');
            $table->integer('stock');
            $table->integer('discount');
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