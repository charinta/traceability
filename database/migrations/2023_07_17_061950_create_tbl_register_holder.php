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
        Schema::create('tbl_register_holder', function (Blueprint $table) {
            $table->id('holder_id');
            $table->timestamp('date_created')->nullable();
            $table->timestamp('date_modify')->nullable();
            $table->string('no_drawing_holder', 50)->nullable();
            $table->string('holder_name', 50)->nullable();
            $table->decimal('holder_spec', 18, 0)->nullable();
            $table->decimal('holder_diameter', 18, 0)->nullable();
            $table->integer('holder_lifetime_std')->nullable();
            $table->integer('holder_frequency_std')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_register_holder');
    }
};