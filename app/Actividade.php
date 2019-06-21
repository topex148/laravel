<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividade extends Model
{
  protected $fillable = [
    'titulo', 'descripcion',
    ];

    public function foto(){
      return $this->hasMany(Foto::class);
    }

    public function packages(){
      return $this->belongsToMany(Package::class);
    }

}
