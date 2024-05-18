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
        schema::create('details', function(Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quotation_id');
            $table->unsignedBigInteger('part_number_id');
            $table->string('description');
            $table->unsignedInteger('width');
            $table->unsignedInteger('length');
            $table->unsignedInteger('quantity');
            $table->decimal('factor', 7, 4);
            $table->decimal('laser', 9, 2);
            $table->decimal('custom_laser_price', 7, 4);
            $table->longText('holes');
            $table->unsignedInteger('welding');
            $table->unsignedInteger('press');
            $table->unsignedInteger('saw');
            $table->unsignedInteger('drill');
            $table->unsignedInteger('clean');
            $table->unsignedInteger('paint');
            $table->unsignedInteger('pipe_thread');
            $table->unsignedInteger('pipe_engage');
            $table->unsignedInteger('press_setup');
            $table->decimal('total', 9, 2);
            $table->timestamps();
            $table->foreign('quotation_id')
                ->references('id')
                ->on('quotations')
                ->onDelete("cascade");
            $table->foreign('part_number_id')
                ->references('id')
                ->on('part_numbers')
                ->onDelete("cascade");
            $table->integer('position')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
