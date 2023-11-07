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
        Schema::create('engine_codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('engine_code');
            $table->string('engine_type');
            $table->string('fuel_induction');
            $table->string('m_codes')->nullable();
            $table->string('years')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engine_code');
    }
};
