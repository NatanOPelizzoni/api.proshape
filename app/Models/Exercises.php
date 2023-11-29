<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercises extends Model
{
    protected $fillable = [
        'name',
    ];

    public function muscularGroups()
    {
        return $this->belongsToMany(MuscularGroup::class, 'exercise_muscular_group', 'exercise_id', 'muscular_group_id');
    }
}
