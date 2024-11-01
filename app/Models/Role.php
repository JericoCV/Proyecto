<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Tabla asociada a este modelo
    protected $table = 'roles';

    // Campos que pueden ser asignados en masa
    protected $fillable = [
        'role_name',  // Nombre del rol
    ];

    /**
     * Relación con el modelo User.
     * Un rol puede tener muchos usuarios.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
