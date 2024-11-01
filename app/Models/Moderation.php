<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moderation extends Model
{
    use HasFactory;

    protected $fillable = ['administrator_id', 'archive_id', 'state'];

    // Una moderación pertenece a un archivo
    public function archive()
    {
        return $this->belongsTo(Archive::class);
    }

    // Una moderación pertenece a un administrador
    public function administrator()
    {
        return $this->belongsTo(User::class, 'administrator_id');
    }
}
