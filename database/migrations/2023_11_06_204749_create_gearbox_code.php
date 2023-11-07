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
        Schema::create('gearbox_codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('gearbox_code');
            $table->string('gearbox_description');
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
        Schema::dropIfExists('gearbox_code');
    }
};
