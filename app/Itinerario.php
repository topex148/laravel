<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerario extends Model
{
  protected $fillable = [
    'RIF_4', 'id_P_3', 'id_Cliente_1', 'Fecha_Inicio', 'Fecha_Final',
    ];

    public function prestadore(){
      return $this->belongsTo(Prestadore::class, 'RIF_4');
    }

    public function turista(){
      return $this->belongsTo(Turista::class, 'id_Cliente_1');
    }

    public function package(){
      return $this->belongsTo(Paquete::class, 'id_P_3');
    }

}
