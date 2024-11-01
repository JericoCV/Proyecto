<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'name', 'fullname', 'course_id'];

    // Un estudiante pertenece a un curso
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Un estudiante tiene muchas calificaciones
    public function grades()
    {
        return $this->hasMany(Grade::class, 'student_id');
    }
}
