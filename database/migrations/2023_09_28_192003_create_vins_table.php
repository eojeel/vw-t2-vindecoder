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
            $table->string('cc');
            $table->string('mmmmm')->nullable();
            $table->string('pp');
            $table->string('mmmm');
            $table->string('dd');
            $table->string('uu');
            $table->string('ee');
            $table->string('tt');
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
