<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['grade', 'comment', 'student_id', 'teacher_id', 'activity_id'];

    // Una calificación pertenece a una actividad
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    // Una calificación pertenece a un estudiante
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    // Una calificación pertenece a un maestro
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
