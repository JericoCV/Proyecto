<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'order', 'page_id'];

    public function elements()
    {
        return $this->hasMany(Element::class);
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
