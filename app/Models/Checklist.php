<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;

    // Tentukan atribut yang dapat diisi
    protected $fillable = ['title', 'card_id'];

    // Relasi dengan Card
    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
