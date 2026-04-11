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

        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->string('category'); // Feed, Medication, etc.
            $table->decimal('amount', 15, 2);
            $table->string('description')->nullable();
            $table->string('paymentMethod'); // Cash, Transfer, etc.
            $table->timestamps();

            
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
