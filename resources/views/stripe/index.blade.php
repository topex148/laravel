@extends('layouts.menu')

@section('content')

<div class="content">
  	<header class="text-center mb-60">
    <h1>Compra de Prueba</h1>
    <h3>US$ 19.99</h3>

    <form enctype="multipart/form-data" action="/LaTesis/public/pago" method="POST">
        {{ csrf_field() }}
        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="{{ config('services.stripe.key') }}"
            data-amount="1990"
            data-name="Compra"
            data-description="Prueba compra"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto">
        </script>
    </form>
    </header>

</div>

@endsection
