<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    // Tentukan atribut yang dapat diisi
    protected $fillable = ['title', 'description', 'list_id']; // Updated to 'list_id'

    // Relasi dengan List
    public function list()
    {
        return $this->belongsTo(ListCard::class, 'list_id'); // Updated to 'list_id'
    }

    // Relasi dengan Label
    public function labels()
    {
        return $this->belongsToMany(Label::class);
    }

    // Relasi dengan Checklist
    public function checklists()
    {
        return $this->hasMany(Checklist::class);
    }
}
