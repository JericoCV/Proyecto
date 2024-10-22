<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'creation_date', 'Administrator_id'];
    protected $dates = ['creation_date'];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function templates()
    {
        return $this->hasMany(Template::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
