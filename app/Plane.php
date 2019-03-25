<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
  protected $fillable = [
    'Fecha_Inicio', 'Fecha_Final', 'Publicidad',
    ];
}
