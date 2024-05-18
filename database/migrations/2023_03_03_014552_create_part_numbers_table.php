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
        Schema::create('part_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('sheetname');
            $table->string('partnumber');
            $table->string('description')->nullable();
            $table->decimal('weight', 10, 2)->nullable();
            $table->string('unitmeasure');
            $table->integer('width')->nullable();
            $table->integer('length')->nullable();
            $table->decimal('price', 14, 6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('part_numbers');
    }
};
