@component('mail::message')
# Bienvenidos {{$user->name}}

Gracias por registrarte. **Lo apreciamos mucho**. Haznos saber si podemos hacer algo para complacerte!

@component('mail::panel')
    La dirección email con la que registro es la siguiente: {{$user->email}}
@endcomponent

@component('mail::button', ['url' => 'http://localhost/LaTesis/public/home'])
Ver mi Tablero!
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
