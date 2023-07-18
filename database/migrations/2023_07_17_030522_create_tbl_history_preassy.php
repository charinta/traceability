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
        Schema::create('tbl_history_preassy', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date_scan')->nullable();
            $table->timestamp('date_created')->nullable();
            $table->string('no_drawing_tool', 50)->nullable();
            $table->string('no_drawing_holder', 50)->nullable();
            $table->string('pic', 50)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_history_preassy');
    }
};
