<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Alumno extends Authenticatable
{
    protected $table = 'alumnos';

    protected $fillable = ['nombre', 'usuario', 'contrasena'];

    // Método para definir la columna de identificación
    public function getAuthIdentifierName()
    {
        return 'usuario';
    }
}

