<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $table = 'todos'; // Pastikan ini sesuai dengan nama tabel di database

    protected $fillable = ['title', 'user_id', 'is_done']; // Pastikan sesuai dengan kolom di database

    protected $casts = [
        'is_done' => 'boolean', // Konversi otomatis ke boolean
    ];

    public $timestamps = true; // Jika ingin menggunakan `created_at` dan `updated_at`

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
