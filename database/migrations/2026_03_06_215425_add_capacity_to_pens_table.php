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
    Schema::table('pens', function (Blueprint $table) {
        $table->integer('capacity')->nullable()->after('name');
        $table->string('status')->default('Active')->after('type');
    });
}

public function down(): void
{
    Schema::table('pens', function (Blueprint $table) {
        $table->dropColumn(['capacity','status']);
    });
}};
