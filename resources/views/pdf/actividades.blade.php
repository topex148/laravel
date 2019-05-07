<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Meriventura</title>
    <!-- CORE CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<!--<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->
    <link href="{{ asset("assets/css/layout.css") }}" rel="stylesheet" type="text/css" />





  </head>
  <body>




    <div class="container">

      <header class="text-center mb-60">

        <img src="./assets/images/_smarty/logo-126x80-negro.jpg" style="width:126px; height:80px; float:left; border-radius:50%; margin-right:25px;"/>

        <h2>Lista de Actividades</h2>
        <p class="lead font-lato">Esta es la lista de las Actividades registrados en el sistema.</p>
        <br/>
        <p class="lead font-lato">Fecha de Reporte: {{ $date }}</p>
        <br/>
      </header>

      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
          </tr>
        </thead>
        <tbody>
          @foreach($actividades as $actividade)
          <tr>
            <th scope="row">{{$actividade->id}}</th>
            <td>{{$actividade->titulo}}</td>
            <td>{{$actividade->descripcion}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

  </div>

  </body>
</html>
