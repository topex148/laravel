<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
  protected $fillable = [
    'title', 'descripcion', 'imagen', 'Galeria', 'RIF_Prest', 'id_Zona', 'id_Atrac', 'id_Activi',
    ];

    public function prestadore(){
      return $this->belongsTo(Prestadore::class, 'RIF_Prest');
    }

    public function atractivo(){
      return $this->belongsTo(Atractivo::class, 'id_Atrac');
    }

    public function zona(){
      return $this->belongsTo(Zona::class, 'id_Zona');
    }

    public function actividade(){
      return $this->belongsTo(Actividade::class, 'id_Activi');
    }
}
