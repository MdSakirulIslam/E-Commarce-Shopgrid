<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('courier_id')->default(0);
            $table->float('order_total');
            $table->float('tax_total');
            $table->float('shipping_total');
            $table->text('order_date');
            $table->text('order_timestamp');
            $table->string('order_status')->default('pending');
            $table->text('delivery_address');
            $table->string('delivery_status')->default('pending');
            $table->text('delivery_date')->nullable();
            $table->text('delivery_timestamp')->nullable();
            $table->string('payment_method');
            $table->text('payment_status')->default('pending');
            $table->text('payment_date');
            $table->text('payment_timestamp');
            $table->text('transaction_id');
            $table->string('currency')->default('BDT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
