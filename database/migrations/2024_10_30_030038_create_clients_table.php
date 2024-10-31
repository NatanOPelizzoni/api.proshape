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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('name');
            $table->date('birth_date');
            $table->float('weight');
            $table->float('height');
            $table->string('fitness_goals');
            $table->integer('training_frequency');
            $table->text('health_restrictions')->nullable();
            $table->string('preferred_workout_type')->nullable();
            $table->text('exercise_history');
            $table->string('current_fitness_level');
            $table->text('injuries_or_surgeries')->nullable();
            $table->string('status');
            $table->foreignId('instructor_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
