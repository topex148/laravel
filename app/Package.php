<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
  protected $fillable = [
    'Fecha_Inicio', 'Fecha_Final',
  ];

  public function itinerario(){
  return $this->hasMany(Itinerario::class);
  }

}
