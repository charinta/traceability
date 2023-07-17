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
        Schema::create('tbl_proses_marking_tool', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date_created')->nullable();
            $table->string('no_drawing_tool', 50)->nullable();
            $table->string('tool_type', 50)->nullable();
            $table->string('month', 50)->nullable();
            $table->string('no_urut', 50)->nullable();
            $table->string('qr_tool_marking', 50)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_proses_marking_tool');
    }
};
