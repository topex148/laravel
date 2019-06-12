<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class planillaRegistro extends Model
{
  protected $fillable = [
    'usuarioNombre', 'usuarioId', 'imagen', 'usuarioCorreo',
    ];
}
