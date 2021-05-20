<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->String('codeOrder');
            $table->decimal('subTotal');
            $table->String('status');
            $table->String('code_order')->unique();
            $table->integer('id_payment');
            $table->decimal('total');
            $table->integer('id_shipment');
            $table->String('phone_number');
            $table->date('date_order');
            $table->integer('id_user');
            $table->integer('id_address');
            $table->String('node')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
