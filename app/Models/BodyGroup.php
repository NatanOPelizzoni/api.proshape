<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class BodyGroup extends Model
{
    use Notifiable;

    protected $fillable = [
        'name',
        'status',
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
