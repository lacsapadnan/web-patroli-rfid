<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patroli extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id', 'date', 'start', 'end', 'report', 'photo'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
