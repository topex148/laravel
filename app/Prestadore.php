<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prestadore extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];
  public $incrementing = false;
  protected $primaryKey = 'RIF';
  protected $fillable = [
    'RIF', 'Telefono', 'RTN', 'DescripcionServicio', 'DescripcionPrestador','DescripcionActividad',
    'Nombre', 'imagen', 'Facebook', 'Twitter', 'Instagram','Fecha_Final',
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
