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
        Schema::create('tbl_holder_position', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date_created')->nullable();
            $table->string('no_drawing', 50)->nullable();
            $table->string('qr_marking', 50)->nullable();
            $table->string('part_name', 50)->nullable();
            $table->unsignedBigInteger('pos_id')->nullable();
            $table->foreign('pos_id')->references('id')->on('tbl_pos')->onDelete('set null');
            $table->string('pos_name', 50)->nullable();
           
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_holder_position');
    }
};