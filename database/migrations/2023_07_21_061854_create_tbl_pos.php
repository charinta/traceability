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
        Schema::create('tbl_pos', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date_created', 7)->nullable();
            $table->timestamp('date_modify', 7)->nullable();
            $table->string('pos_name', 50)->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pos');
    }
};