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
        Schema::create('quotations', function (Blueprint $table){
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('name');
            $table->foreignId('client_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->date('date');
            $table->string('description');
            $table->decimal('laser', 7, 4);
            $table->decimal('weld', 7, 4);
            $table->decimal('press', 7, 4);
            $table->decimal('saw', 7, 4);
            $table->decimal('drilling', 7, 4);
            $table->decimal('cleaning', 7, 4);
            $table->decimal('painting', 7, 4);
            $table->decimal('pipe_thread', 7, 4);
            $table->decimal('pipe_engage', 7, 4);
            $table->decimal('press_setup', 7, 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
