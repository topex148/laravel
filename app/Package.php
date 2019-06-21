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

  public function atractivos(){
    return $this->belongsToMany(Atractivo::class);
  }

  public function actividades(){
    return $this->belongsToMany(Actividade::class);
  }

  public function prestadores(){
    return $this->belongsToMany(Prestadore::class);
  }

}
