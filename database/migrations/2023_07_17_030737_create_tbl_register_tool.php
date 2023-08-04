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
        Schema::create('tbl_register_tool', function (Blueprint $table) {
            $table->id('id');
            $table->timestamp('date_created')->nullable();
            $table->timestamp('date_modify')->nullable();
            $table->string('no_drawing_tool', 50)->nullable();
            $table->string('tool_type', 50)->nullable();
            $table->decimal('tool_spec', 18, 0)->nullable();
            $table->decimal('tool_diameter', 18, 0)->nullable();
            $table->integer('tool_lifetime_std')->nullable();
            $table->integer('tool_frequency_std')->nullable();
            $table->string('line', 50)->nullable();
            $table->string('op', 50)->nullable();
            $table->string('no_drawing_holder', 50)->nullable();
            $table->integer('washing_ct')->nullable();
            $table->integer('grinding_ct')->nullable();
            $table->integer('setting_ct')->nullable();
            $table->string('image_check')->nullable();
            $table->string('remark')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_register_tool');
    }
};
