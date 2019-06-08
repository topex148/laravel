@component('mail::message')

#<p><b> Buenos Dias {{ config('app.name') }}!</b></p>

<div>
<p><b>Mi nombre es:</b>&nbsp;{{ $demo->nombreTurista }}</p>
<p><b>Me comunico con usted por lo siguiente:</b>&nbsp;{{ $demo->Mensaje }}</p>
</div>

Estos son mis datos personales:<br>
@component('mail::table')
| Nombre    | Email        | Telefono  |
| ------------- |:-------------:| --------:|
| {{ $demo->nombreTurista }}      | {{ $demo->correoTurista }}      | {{ $demo->telefonoTurista }}      |

@endcomponent

Lo invito a comunicarce conmigo!

Para revisar las personas que se han comunicado con usted seleccione el siguiente botón!

@component('mail::button', ['url' => 'http://localhost/LaTesis/public/contactos'])
Ver Tablero Contacto!
@endcomponent

Gracias,<br>

{{ config('app.name') }}
@endcomponent
