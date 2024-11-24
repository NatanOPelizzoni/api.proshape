<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TrainingSheet extends Model
{
    use Notifiable;

    protected $fillable = [
        'client_id',
        'start_date',
        'end_date',
        'status',
        'exercises',
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
