<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'position', 'page_id'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
