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
        Schema::create('tbl_history_marking', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date_scan', 7)->nullable();
            $table->timestamp('date_created', 7)->nullable();
            $table->timestamp('date_modify', 7)->nullable();
            $table->string('no_drawing', 50)->nullable();
            $table->string('qr_marking', 50)->nullable();
            $table->string('mode', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_history_marking');
    }
};