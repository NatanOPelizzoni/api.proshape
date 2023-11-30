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
        Schema::create('exercise_training_sheets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('training_sheet_id');
            $table->unsignedBigInteger('exercise_id');
            $table->integer('series');
            $table->integer('repetitions');
            $table->float('weight');
            $table->integer('order');
            $table->timestamps();

            $table->foreign('training_sheet_id')->references('id')->on('training_sheets')->onDelete('cascade');
            $table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_training_sheets');
    }
};
