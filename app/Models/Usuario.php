<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'password',
        'nombre',
        'apellidos',
        'dni',
        'telefono',
        'pais',
        'iban',
        'informacion'
    ];
}
