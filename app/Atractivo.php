<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atractivo extends Model
{
  protected $fillable = [
    'zona_id', 'Nombre_Atractivo', 'Ubicacion', 'Descripcion_Atractivo',
    ];

    public function zona(){
      return $this->belongsTo(Zona::class);
    }

    public function foto(){
      return $this->hasMany(Foto::class);
    }

    public function packages(){
      return $this->belongsToMany(Package::class);
    }
}
