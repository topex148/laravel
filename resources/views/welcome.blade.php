<!doctype html>
<html>
    <head>

      <meta charset="utf-8">
      <title>ChatRoom</title>

      <link rel="{{ asset("stylesheet") }}" href="/css/app.css">

    </head>

    <body>

      <div id="app">
        <h1>ChatRoom</h1>
        <chat-message></chat-message>
        <chat-log></chat-log>
        <chat-composer></chat-composer>

      </div>

      <script src="{{ asset("js/app.js") }}"></script>


    </body>

</html>
