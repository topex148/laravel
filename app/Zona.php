<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
  protected $fillable = [
    'nombre', 'Descripcion_Zona',
    ];

    public function atractivo(){
      return $this->hasMany(Atractivo::class);
    }

    public function foto(){
      return $this->hasMany(Foto::class);
    }
}
