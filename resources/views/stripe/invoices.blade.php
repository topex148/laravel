@extends('layouts.menu')

@section('content')

<div class="content">
  <header class="text-center mb-60">
    <table>
        @foreach ($invoices as $invoice)
            <tr>
                <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                <td>{{ $invoice->total() }}</td>
                <td><a href="invoices/{{ $invoice->id }}">Descargar</a></td>
            </tr>
        @endforeach
    </table>
  </header>
</div>

@endsection
