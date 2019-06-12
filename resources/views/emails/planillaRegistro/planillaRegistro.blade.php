@component('mail::message')

#<p><b> Buenos Dias {{ config('app.name') }}!</b></p>

<div>
<p><b>Mi nombre es:</b>&nbsp;{{ $demo->nombreTurista }}</p>
<p><b>Me comunico con usted para enviarle la planilla de registro en la plataforma.</p>
</div>

Estos son mis datos personales:<br>
@component('mail::table')
| Nombre    | Email        |
| ------------- |:-------------:|
| {{ $demo->nombreTurista }}      | {{ $demo->correoTurista }}      |

@endcomponent

Lo invito a comunicarce conmigo!

Para revisar las personas que se han comunicado con usted seleccione el siguiente boton!

@component('mail::button', ['url' => 'http://localhost/LaTesis/public/prestadores/contacto'])
Ver Tablero Contacto!
@endcomponent

Gracias,<br>

{{ config('app.name') }}
@endcomponent
