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
        Schema::create('model_engine_gearboxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('model_id');
            $table->unsignedInteger('sale_code');
            $table->string('model_description');
            $table->string('engine_spec');
            $table->enum('transmission_type', ['A', 'M']);
            $table->unsignedInteger('engine_code')->nullable();
            $table->unsignedInteger('gearbox_code')->nullable();
            $table->unsignedInteger('extras')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_engine_gearboxes');
    }
};
