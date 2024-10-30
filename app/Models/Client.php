<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use Notifiable;

    protected $fillable = [
        'email',
        'name',
        'birth_date',
        'weight',
        'height',
        'fitness_goals',
        'training_frequency',
        'health_restrictions',
        'preferred_workout_type',
        'exercise_history',
        'current_fitness_level',
        'injuries_or_surgeries',
        'status',
        'personal_id',
        'user_id',
        'created_by',
        'updated_by',
    ];

    protected $hidden = [
    ];

    protected function casts(): array
    {
        return [
        ];
    }
}
