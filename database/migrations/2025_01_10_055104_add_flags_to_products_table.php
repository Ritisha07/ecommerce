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
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('top_selling')->default(false);
            $table->boolean('seller_of_the_week')->default(false);
            $table->boolean('flash_sale')->default(false);
            $table->timestamp('sale_start_time')->nullable();
            $table->timestamp('sale_end_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['top_selling', 'seller_of_the_week', 'flash_sale', 'sale_start_time', 'sale_end_time']);
        });
    }
};
