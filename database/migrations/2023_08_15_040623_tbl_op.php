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
        Schema::create('tbl_op', function (Blueprint $table) {
            $table->id();

            $table->timestamp('date_created')->nullable();
            $table->timestamp('date_modify')->nullable();
            $table->unsignedBigInteger('line_id');
            $table->string('op')->nullable();
        });

        Schema::table('tbl_op', function (Blueprint $table) {
            $table->foreign('line_id')->references('id')->on('tbl_line')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_op', function (Blueprint $table) {
            $table->dropForeign(['line_id']);
        });
        Schema::dropIfExists('tbl_op');
    }
};
