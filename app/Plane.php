<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
  protected $fillable = [
    'precio','name', 'descripcion', 'imagen', 'Fecha_Inicio', 'Fecha_Final', 'Publicidad',
    ];
}
