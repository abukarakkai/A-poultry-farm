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
Schema::create('sales', function (Blueprint $table) {
    $table->id();
    $table->date('date');
    $table->string('customer_name');
    $table->string('income_type'); // Egg, Manure, etc
    $table->integer('quantity');
    $table->decimal('price', 10, 2);
    $table->decimal('total_amount', 10, 2);
    $table->string('payment_status'); // Paid / Pending
    $table->text('note')->nullable();
    $table->timestamps();
});    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
