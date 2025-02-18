<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'expertise', // C++, JS, Node.js, PHP, etc.
        'social_links',
    ];

    // Relaciones
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
