<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Exercise extends Model
{
    use Notifiable;

    protected $fillable = [
        'name',
        'status',
        'body_group_id',
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
