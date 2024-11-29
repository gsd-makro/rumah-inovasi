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
        Schema::create('pivot_infographics_indicators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('infographic_id')->references('id')->on('infographics')->cascadeOnDelete();
            $table->foreignId('indicator_id')->references('id')->on('indicators')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_infographics_indicators');
    }
};
