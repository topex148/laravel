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
use App\Subscription;
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
            $id = Auth::user()->id;
            $user = User::find($id);
            $user->newSubscription('AlojamientoMensual', 'monthly')->create($request->stripeToken);

            $prestadores = Prestadore::all();
            $prueba= Prestadore::onlyTrashed()->where('userId', $id)->restore();

            foreach ($prestadores as $prestadore){
              if (($prestadore->userId) == (Auth::user()->id)) {
                $post = Prestadore::find($prestadore->RIF);
                $post->Fecha_Final = date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 1 month"));
                $post->save();
              }
            }

            return redirect()->route('prestador.planesExito1');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

    }

    public function subscribe2(Request $request)
    {



        try {
            Stripe::setApiKey(config('services.stripe.secret'));
            $id = Auth::user()->id;
            $user = User::find($id);
            $user->newSubscription('AlojamientoAnual', 'yearly')->create($request->stripeToken);

            $prestadores = Prestadore::all();
            $prueba= Prestadore::onlyTrashed()->where('userId', $id)->restore();

            foreach ($prestadores as $prestadore){
              if (($prestadore->userId) == (Auth::user()->id)) {
                $post = Prestadore::find($prestadore->RIF);
                $post->Fecha_Final = date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 1 year"));
                $post->save();
              }
            }

            return redirect()->route('prestador.planesExito2');

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

    }

    public function subscribe3(Request $request)
    {

        try {
            Stripe::setApiKey(config('services.stripe.secret'));
            $id = Auth::user()->id;
            $user = User::find($id);
            $user->newSubscription('PublicidadMensual', 'mes')->create($request->stripeToken);

            return redirect()->route('prestador.planesExito3');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

    }

    public function subscribe4(Request $request)
    {

        try {
            Stripe::setApiKey(config('services.stripe.secret'));
            $id = Auth::user()->id;
            $user = User::find($id);
            $user->newSubscription('PublicidadAnual', 'año')->create($request->stripeToken);

            return redirect()->route('prestador.planesExito4');

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

        dd('Éxito!!');
      }

      catch (\stripe\Error\Card $e){
        $body = $e->getJsonBody();
        $err = $body['error'];
        $error = $err['message'];

        Log::critical(
          "No se pudo actualizar la tarjeta de crédito de {$user->email}{$e->getMessage()}, $error"
        );
      }

      catch(\Exception $e){
        dd("Algo esta realmente mal");
      }

    }



    public function invoices()
    {
        try {
            Stripe::setApiKey(config('services.stripe.secret'));
            $id = Auth::user()->id;

            $user = User::find($id);
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
            $id = Auth::user()->id;
            $user = User::find($id);

            return $user->downloadInvoice($invoice_id, [
                    'vendor'  => 'Meriventura',
                    'product' => 'Subscripcion Alojamiento',
            ]);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

}
