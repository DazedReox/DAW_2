<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'time',
        'speaker_id',
        'type',       // conferencia o taller
        'capacity',   // capacidad máxima de asistentes
    ];

    // Relaciones
    public function speaker()
    {
        return $this->belongsTo(Speaker::class);
    }

    public function attendees()
    {
        return $this->hasMany(Attendance::class);
    }
}
