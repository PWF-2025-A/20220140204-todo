<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id', 'is_complete'];

    protected $casts = [
        'is_complete' => 'boolean', // Agar nilai `is_complete` otomatis dikonversi ke boolean
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
