@extends('layouts.menuInicio')

@section('content')
<section>
<div class="content">

  <header class="text-center mb-60">
    <h2>Lista de Facturas</h2>
    <p class="lead font-lato">Esta es la lista de las Facturas Stripe registradas en el sistema.</p>
  </header>

<div class="row justify-content-center">
<div class="col-md-8">
<h4>Facturas Stripe</h4>
      <div class="table-responsive">
      <table class="table table-bordered table-striped table-vertical-middle">
      <thead>
        <tr>
          <th class="fw-30">Fecha</th>
          <th>Precio</th>
          <th>Descargar</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($invoices as $invoice)
            <tr>
                <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                <td>{{ $invoice->total() }}</td>
                <td><a href="invoices/{{ $invoice->id }}">Descargar</a></td>
            </tr>
        @endforeach
      </tbody>
    </table>
    </div>
    </div>
    </div>

</div>
</section>
@endsection
