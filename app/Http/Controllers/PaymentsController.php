<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Input;
use Image;
use App\Prestadore;
use App\Itinerario;
use App\Turista;
use App\Actividade;
use App\Package;
use App\Foto;
use App\Zona;
use App\Atractivo;
use App\Plane;
use App\Registro;
use App\Imagene;
use App\Contacto;
use App\User;
use Mail;

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class PaymentsController extends Controller
{

  public function planPromocion()
  {

    $foto = Foto::all();
    $plane = Plane::all();
    $actividad = Actividade::all();
    return view("PaginasIniciales/planes", ['fotos' => $foto, 'planes' => $plane, 'actividades' => $actividad]);
  }

    public function subscribe1(Request $request)
    {

        try {
            Stripe::setApiKey(config('services.stripe.secret'));
            $user = User::find(1);
            $user->newSubscription('main', 'monthly')->create($request->stripeToken);
            return 'Suscripción exitosa! Acabas de suscribirte al Plan Gold';
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

    }

    public function subscribe2(Request $request)
    {

        try {
            Stripe::setApiKey(config('services.stripe.secret'));
            $user = User::find(1);
            $user->newSubscription('main', 'yearly')->create($request->stripeToken);
            return 'Suscripción exitosa! Acabas de suscribirte al Plan Gold';
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

    }

    public function changePlan()
    {
      try{
        $user = Auth::loginUsingId(1);

        $newPlan = 'yearly';

        $user->subscription('main')
        ->skipTrial()
        ->swap($newPlan);

        dd('Success!!');
      }

      catch (\stripe\Error\Card $e){
        $body = $e->getJsonBody();
        $err = $body['error'];
        $error = $err['message'];

        Log::critical(
          "Could not update credit card of {$user->email}{$e->getMessage()}, $error"
        );
      }

      catch(\Exception $e){
        dd("Something really bad");
      }

    }



    public function invoices()
    {
        try {
            Stripe::setApiKey(config('services.stripe.secret'));
            $user = User::find(1);
            $foto = Foto::all();
            $invoices = $user->invoices();
            return view('stripe/invoices', compact('invoices'), ['fotos' => $foto]);
        } catch (\Exception $ex) {
                return $ex->getMessage();
        }
    }

    public function invoice($invoice_id)
    {
        try {
            Stripe::setApiKey(config('services.stripe.secret'));
            $user = User::find(1);

            return $user->downloadInvoice($invoice_id, [
                    'vendor'  => 'Your Company',
                    'product' => 'Your Product',
            ]);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

}
