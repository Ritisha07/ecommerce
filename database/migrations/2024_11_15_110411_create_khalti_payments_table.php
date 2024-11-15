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
        Schema::create('khalti_payments', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_order_id')->unique();
            $table->string('purchase_order_name');
            $table->integer('amount'); // Amount in paisa
            $table->string('return_url');
            $table->string('payment_url')->nullable(); // Store the payment URL if needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khalti_payments');
    }
};
