<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSheet extends Model
{
    protected $fillable = [
        'student_id',
        'start_date',
        'end_date'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
