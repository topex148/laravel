<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestadore extends Model
{
  public $incrementing = false;
  protected $primaryKey = 'RIF';
  protected $fillable = [
    'RIF', 'Telefono', 'RTN', 'DescripcionServicio', 'DescripcionPrestador',
    'Nombre', 'imagen', 'Facebook', 'Twitter', 'Instagram',
    ];

    public function itinerario(){
      return $this->hasMany(Itinerario::class);
    }

    public function foto(){
      return $this->hasMany(Foto::class);
    }

    public function user(){
      return $this->hasMany(User::class);
    }

}
