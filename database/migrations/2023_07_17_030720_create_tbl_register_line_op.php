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
        Schema::create('tbl_register_line_op', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date_created', 7)->nullable();
            $table->timestamp('date_modify', 7)->nullable();
            $table->string('line', 50)->nullable();
            $table->string('op', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_register_line_op');
    }
};