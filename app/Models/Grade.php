<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_level',
        'title',
        'gaji_pokok',
        'tunjangan_kehadiran',
        'tunjangan_operasional',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class, 'id_level', 'id');
    }
}
