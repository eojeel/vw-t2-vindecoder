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
        Schema::table('vins', function (Blueprint $table) {
            $table->renameColumn('chassis_number', 'chassis_number');
            $table->renameColumn('mmmmm', 'mcode_1');
            $table->renameColumn('paint_interior', 'paint_interior');
            $table->renameColumn('mmmm', 'mcode_2');
            $table->renameColumn('dd', 'model_year');
            $table->renameColumn('uu', 'production_plan');
            $table->renameColumn('ee', 'export_destination');
            $table->renameColumn('tt', 'body_engine_model');
        });
    }
};
