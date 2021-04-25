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
            $table->id()->autoIncrement();
            $table->String('name_product');
            $table->string('description');
            $table->decimal('price', 8, 2);
            $table->String('default_image')->nullable();
            $table->String('image1')->nullable();
            $table->String('image3')->nullable();
            $table->String('image4')->nullable();
            $table->String('image2')->nullable();
            $table->decimal('sale_price');
            $table->boolean('status');
            $table->String('overview');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->timestamp('deleted_at')->nullable();
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
