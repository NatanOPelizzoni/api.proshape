<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'birth_date',
        'weight',
        'height',
        'training_goals',
        'training_frequency',
        'health_restrictions',
    ];
}
