<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuscularGroup extends Model
{
    protected $fillable = [
        'name',
    ];

    public function exercises()
    {
        return $this->belongsToMany(Exercises::class, 'exercise_muscular_groups', 'muscular_group_id', 'exercise_id');
    }
}
