@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique Su Dirección Email ') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nuevo link de verificación a sido enviado a su dirección email.') }}
                        </div>
                    @endif

                    {{ __('Antes de proceder, por favor chequear su email por un link de verificación.') }}
                    {{ __('Si usted no recibió el email') }}, <a href="{{ route('verification.resend') }}">{{ __('seleccione acá para recibir otro') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
