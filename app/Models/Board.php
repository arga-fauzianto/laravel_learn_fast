<?php

namespace App\Models;

use App\Models\ListCard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    // Tentukan atribut yang dapat diisi
    protected $fillable = ['name', 'user_id'];

    // Relasi dengan List
    public function lists()
    {
        return $this->hasMany(ListCard::class);
    }
}
