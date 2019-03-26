<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
  protected $fillable = [
    'title', 'descripcion', 'imagen', 'Galeria', 'RIF_Prest', 'id_Zona', 'id_Atrac', 'id_Activi',
    ];

    public function actividade(){
      return $this->belongsTo(Actividade::class, 'id_Activi');
    }
}
