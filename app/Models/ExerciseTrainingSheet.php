<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseTrainingSheet extends Model
{
    protected $fillable = [
        'training_sheet_id',
        'exercise_id',
        'series',
        'repetitions',
        'weight',
        'order',
    ];

    public function trainingSheet()
    {
        return $this->belongsTo(TrainingSheet::class);
    }

    public function exercises()
    {
        return $this->belongsTo(Exercises::class);
    }
}
