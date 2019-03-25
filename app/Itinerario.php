<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerario extends Model
{
  protected $fillable = [
    'user_id', 'RIF_4', 'id_P_3', 'id_Cliente_1', 'Fecha_Inicio', 'Fecha_Final',
    ];
}
