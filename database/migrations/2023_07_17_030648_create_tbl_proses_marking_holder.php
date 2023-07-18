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
        Schema::create('tbl_proses_marking_holder', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date_created', 7)->nullable();
            $table->string('nama_line', 50)->nullable();
            $table->string('op_number', 50)->nullable();
            $table->string('no_urut_tool', 50)->nullable();
            $table->string('no_urut_holder', 50)->nullable();
            $table->string('qr_holder_marking', 50)->nullable();
            $table->string('no_drawing', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_proses_marking_holder');
    }
};