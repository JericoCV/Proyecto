<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'content', 'order', 'style', 'section_id', 'image_path'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
