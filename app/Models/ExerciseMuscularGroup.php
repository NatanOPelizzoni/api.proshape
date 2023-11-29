<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseMuscularGroup extends Model
{
    protected $fillable = [
        'exercise_id',
        'muscular_group_id'
    ];
}
