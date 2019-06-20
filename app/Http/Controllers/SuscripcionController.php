<?php

namespace App\Http\Controllers;

use App\User;
use App\Subscription;
use Illuminate\Http\Request;

class SuscripcionController extends Controller
{
  public function index()
  {
      $suscripciones = Subscription::all();
      $users = User::all();

      return view('suscripcion.index', compact('suscripciones', 'users'));
  }

  public function show(User $user)
  {
      $suscripciones = Subscription::all();
      return view('suscripcion.show', compact ('suscripciones', 'user'));
  }
}
