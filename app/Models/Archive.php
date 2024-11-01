<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'path', 'mail', 'upload_date', 'course_id', 'approved'];

    // Un archivo pertenece a un curso
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Un archivo tiene una moderación
    public function moderation()
    {
        return $this->hasOne(Moderation::class);
    }
}
