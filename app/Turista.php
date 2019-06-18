<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turista extends Model
{
  protected $fillable = [
    'Pais_P', 'Estado_P', 'userId', 'edad', 'genero',
    ];

    public function itinerario(){
      return $this->hasMany(Itinerario::class);
    }
}
