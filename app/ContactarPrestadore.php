<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactarPrestadore extends Model
{
  protected $fillable = [
    'nombre', 'correo', 'Telefono', 'Mensaje',  'Asunto', 'name', 'email', 'RIF', 
    ];
}
