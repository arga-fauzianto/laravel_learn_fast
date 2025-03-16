<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ListCard extends Model
{
    use HasFactory;

    // Tentukan atribut yang dapat diisi
    protected $fillable = ['name', 'board_id'];

    // Relasi dengan Board
    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    // Relasi dengan Card
    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}

