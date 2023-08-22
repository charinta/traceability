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
        Schema::create('tbl_historical_data', function (Blueprint $table) {
            $table->id();
            $table->date('date_created')->nullable();
            $table->timestamp('date', 7)->nullable();
            $table->string('Id_Tool', 50)->nullable();
            $table->timestamp('Dolly_Tool_In', 7)->nullable();
            $table->timestamp('Disassy_Tool', 7)->nullable();
            $table->timestamp('Regrinding_Auto', 7)->nullable();
            $table->timestamp('Regrinding_Manual', 7)->nullable();
            $table->timestamp('Pre_Assy', 7)->nullable();
            $table->timestamp('Mc_NT', 7)->nullable();
            $table->timestamp('Mc_Zoller', 7)->nullable();
            $table->timestamp('Mc_Speroni', 7)->nullable();
            $table->timestamp('Supply', 7)->nullable();
            $table->string('Flagg', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_historical_data');
    }
};
