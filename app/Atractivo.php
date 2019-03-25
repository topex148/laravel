<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atractivo extends Model
{
  protected $fillable = [
    'zona_id', 'Nombre_Atractivo', 'Ubicacion', 'Descripcion_Atractivo',
    ];
}
