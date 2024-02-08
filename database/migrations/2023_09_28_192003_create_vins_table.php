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
        Schema::create('vins', function (Blueprint $table) {
            $table->id();
            $table->string('chassis_number');
            $table->string('mcode_1')->nullable();
            $table->string('paint_interior');
            $table->string('mcode_2');
            $table->string('model_year');
            $table->string('production_plan');
            $table->string('export_destination');
            $table->string('body_engine_model');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vin');
    }
};
