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
        Schema::create('tbl_register_standard_check', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date_created')->nullable();
            $table->timestamp('date_modify')->nullable();
            $table->string('pos_name', 50)->nullable();
            $table->string('item_check', 50)->nullable();
            $table->text('standard_check')->nullable();
            $table->decimal('batas_atas')->nullable();
            $table->decimal('batas_bawah')->nullable();
            $table->string('status_data')->nullable();
            $table->string('remark', 50)->nullable();
            $table->string('status', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_register_standard_check');
    }
};
