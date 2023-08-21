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
        Schema::create(
            'tbl_tool_process',
            function (Blueprint $table) {
                $table->id();
                $table->timestamp('date_created')->nullable();
                $table->timestamp('date_modify')->nullable();

                $table->unsignedBigInteger('line_id');
                $table->unsignedBigInteger('op_id');
                $table->string('tool_process')->nullable();
            }
        );

        Schema::table('tbl_tool_process', function (Blueprint $table) {
            $table->foreign('line_id')->references('id')->on('tbl_line')->onDelete('cascade');
            $table->foreign('op_id')->references('id')->on('tbl_op')->onDelete('no action');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_tool_process', function (Blueprint $table) {
            $table->dropForeign(['line_id']);
            $table->dropForeign(['op_id']);
        });
        Schema::dropIfExists('tbl_tool_process');
    }
};
