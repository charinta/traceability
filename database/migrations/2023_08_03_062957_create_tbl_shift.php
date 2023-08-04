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
        Schema::create('tbl_shift', function (Blueprint $table) {
            $table->id();
            $table->string('shift')->nullable();
            $table->time('start')->nullable();
            $table->time('finish')->nullable();
            $table->timestamp('date_created', 7)->nullable();
            $table->timestamp('date_modify', 7)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_shift');
    }
};