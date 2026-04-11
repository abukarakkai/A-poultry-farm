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
    Schema::create('pens', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Pen A, Batch 1 etc
        $table->integer('initial_birds');
        $table->date('start_date');
        $table->string('type'); // Layers or Broilers
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pens');
    }
};
