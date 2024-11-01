<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'level', 'teacher_id'];

    // Un curso pertenece a un maestro
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    // Un curso tiene muchos estudiantes
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    // Un curso tiene muchos archivos
    public function archives()
    {
        return $this->hasMany(Archive::class);
    }

    // Un curso tiene muchas actividades
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
