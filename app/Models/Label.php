<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    // Tentukan atribut yang dapat diisi
    protected $fillable = ['name', 'color'];

    // Relasi dengan Card
    public function cards()
    {
        return $this->belongsToMany(Card::class);
    }
}
