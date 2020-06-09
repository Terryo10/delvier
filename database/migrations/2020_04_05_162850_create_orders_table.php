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
            $table->string('paymentStatus')->default('initiated');
            $table->string('transaction_ref');
            // $table->double('checkedOutPrice');
            $table->unsignedBigInteger('delivery_id');
            $table->string('status');
            $table->integer('commision');
            $table->string('tracker_id');
            $table->string('shipment_id')  ;
            $table->string('trackerUrl') ;
            $table->string('carrier') ;
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
