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
Schema::create('settings', function (Blueprint $table) {
    $table->id();
    $table->string('farm_name')->nullable();
    $table->string('address')->nullable();
    $table->string('phone')->nullable();
    $table->string('logo')->nullable();
    $table->string('currency')->default('₦');
    $table->integer('rows_per_page')->default(5);
    $table->timestamps();
});    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
