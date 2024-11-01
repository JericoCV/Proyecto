<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'course_id'];

    // Una actividad pertenece a un curso
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Una actividad tiene muchas calificaciones
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
